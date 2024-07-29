<?php

namespace App\Http\Controllers\Payment;

use App\Notifications\UserInvoiceProductPaidNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\TransactionOrder;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\SellerInvoiceProductPaidNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class CallbackController extends Controller
{
    // Isi dengan private key anda
    protected ?string $privateKey;

    public function __construct()
    {
        $this->privateKey = config('tripay.private_key');
    }

    public function handle(Request $request)
    {
        try {

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
                        # Set status paid
                        $transaction->update([
                            'status' => 'PAID',
                            'delivery_status' => 'dikemas',
                            'paid_at' => now(),
                        ]);

                        # Set status sold out and send the notification
                        $transaction->order()->get()->map(function (?Model $query) {
                            $query->product()?->update(['status' => 'sold']);
                            $query->product_auction()?->update(['status' => 'sold']);
                        });

                        User::find($transaction->user_id)->notify(new UserInvoiceProductPaidNotification($transaction));
                        User::find($transaction->order()->first()->product->user_id)->notify(new SellerInvoiceProductPaidNotification($transaction));
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

                return response()->json(['success' => true]);
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), $th->getTrace());
            return response()->json(['success' => false, 'error' => true, 'message' => 'Ada kesalahan di dalam sistem']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json(['success' => false, 'error' => true, 'message' => 'Ada kesalahan di dalam sistem']);
        }
    }
}
