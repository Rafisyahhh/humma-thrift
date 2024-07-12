<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\TransactionOrder;
use App\Models\Product;
use App\Http\Controllers\Controller;

class CallbackController extends Controller
{
    // Isi dengan private key anda
    protected $privateKey = 'AVI1P-HcPWV-b5gwQ-6uU3d-61101';

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
            $product = Product::where('id', $transaction->product_id)->first();

            if (!$transaction) {
                return Response::json([
                    'success' => false,
                    'message' => 'No invoice found or already paid: ' . $transactionId,
                ]);
            }

            switch ($status) {
                case 'PAID':
                    $transaction->update([
                        'status' => 'PAID',
                        'delivery_status' => 'dikemas'
                    ]);
                    $product->update([
                        'status' => 'sold'
                    ]);
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
