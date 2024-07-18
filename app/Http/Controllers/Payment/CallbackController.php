<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\TransactionOrder;
use App\Models\Product;
use App\Models\ProductAuction;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class CallbackController extends Controller
{
    // Isi dengan private key anda
    protected $privateKey = 'MJX8G-Xiznc-oQ36k-Es0Gy-DCI1j';

    public function handle(Request $request)
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $this->privateKey);

        if ($signature !== (string) $callbackSignature) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid signature',
            ]);
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return Response::json([
                'success' => false,
                'message' => 'Unrecognized callback event, no action was taken',
            ]);
        }

        $data = json_decode($json);

        if (JSON_ERROR_NONE !== json_last_error()) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid data sent by tripay',
            ]);
        }
        $transactionId = $data->merchant_ref;
        $tripayReference = $data->reference;
        $status = strtoupper((string) $data->status);

        if ($data->is_closed_payment === 1) {
            $transaction = TransactionOrder::where('reference_id', $tripayReference)
                ->where('status', '=', 'UNPAID')
                ->first();

            if (!$transaction) {
                return Response::json([
                    'success' => false,
                    'message' => 'No invoice found or already paid',
                ]);
            }

            switch ($status) {
                case 'PAID':
                    $transaction->update([
                        'status' => 'PAID',
                        'delivery_status' => 'dikemas'
                    ]);


                        $transaction->order()->get()->map(function(?Model $query) {
                            $query->product()?->update(['status' => 'sold']);
                            $query->product_auction()?->update(['status' => 'sold']);
                        });
                    break;

                case 'EXPIRED':
                    $transaction->update(['status' => 'EXPIRED']);
                    break;

                case 'FAILED':
                    $transaction->update(['status' => 'FAILED']);
                    break;

                default:
                    return Response::json([
                        'success' => false,
                        'message' => 'Unrecognized payment status',
                    ]);
            }

            return Response::json(['success' => true]);
        }
    }
}
