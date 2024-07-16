<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TripayController extends Controller
{
    public function getPaymentChannels()
    {
        $apiKey = config('tripay.api_key');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            // Return empty array or handle error as needed
            return [];
        }

        $responseData = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            // Handle JSON decode error
            return [];
        }

        return $responseData;
    }

    public function requestTransaction($method, $product)
    {
        $apiKey       = config('tripay.api_key');
        $privateKey   = config('tripay.private_key');
        $merchantCode = config('tripay.merchant_code');
        $merchantRef  = 'PX-' . time();

        $users = auth()->user();

        $data = [
            'method'         => $method,
            'merchant_ref'   => $merchantRef,
            'amount'         => $product->sum('price'),
            'customer_name'  => $users->name,
            'customer_email' => $users->email,
            'customer_phone' => $users->phone,
            'order_items'    => $product->map(function($item) {
                return [
                    'name'        => $item->title,
                    'price'       => $item->price,
                    'quantity'    => 1,
                    'product_url' => route('store.product.detail', ['store' => $item->userStore->username, 'product' => $item->slug]),
                    'image_url'   => url(asset("storage/{$item->getAttribute('thumbnail')}")),
                ];
            }),
            'return_url'   => url('/profile'),
            'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
            'signature'    => hash_hmac('sha256', $merchantCode . $merchantRef . $product->sum('price'), $privateKey)
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey
        ])->post('https://tripay.co.id/api-sandbox/transaction/create', $data);

        if ($response->failed()) {
            return (object)['error' => $response->body()];
        }

        $decodedResponse = $response->json();

        if (!isset($decodedResponse['data'])) {
            return (object)['error' => 'No data property in response'];
        }

        return $decodedResponse['data'];
    }

    public function detailTransaction($reference)
    {
        $apiKey = config('tripay.api_key');
        $payload = ['reference' => $reference];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/detail?' . http_build_query($payload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_HTTPHEADER     => ['Authorization: Bearer ' . $apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($response === false) {
            return $error;
        }

        $decodedResponse = json_decode($response);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return 'JSON decode error: ' . json_last_error_msg();
        }

        if (!isset($decodedResponse->data)) {
            return 'Data property is missing in the response';
        }

        return $decodedResponse->data;
    }
}
