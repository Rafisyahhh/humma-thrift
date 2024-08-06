<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\cart;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\ProductAuction;
use App\Models\TransactionOrder;
use App\Models\UserAddress;
use App\Notifications\NotificationUserCheckout;
use App\Notifications\NotificationUserAuctionCheckout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $products = session('checkouted_product');
            $method = $request->method;
            $address = UserAddress::find($request->addressOption);
            $product = Product::whereIn('id', $products)->get();

            if (!$method) {
                return back()->withErrors(['error' => 'PILIH PEMBAYARAN WAJIB DIISI']);
            }

            if (!$address) {
                return back()->withErrors(['error' => 'ALAMAT WAJIB DIISI']);
            }

            $tripay = new TripayController();
            $transaction = $tripay->requestTransaction($method, $product);

            if (isset($transaction->error)) {
                return back()->withErrors(['error' => $transaction->error]);
            }

            # Buat Data Transaksi
            $transactions = TransactionOrder::create([
                'user_id' => auth()->id(),
                'user_address_id' => $address->id,
                'transaction_id' => $transaction['merchant_ref'],
                'reference_id' => $transaction['reference'],
                'total' => $transaction['amount'],
                'expired_at' => now()->addDays(1),
                'paid_at' => null,
                'delivery_status' => 'selesaikan pesanan',
                'status' => $transaction['status'],
                'total_harga' => $transaction['amount_received'],
                'biaya_admin' => $transaction['total_fee'],
                'payment_method' => $transaction['payment_name']
            ]);

            # Buat Data Daftar Order
            $orders = $product->map(function ($item) use ($transactions) {
                return Order::create([
                    'product_id' => $item->id,
                    'transaction_order_id' => $transactions->id
                ]);
            });

            # Kirim Notifikasi
            Auth::user()->notify(new NotificationUserCheckout($transactions, $orders));

            # Session destroying
            cart::whereIn('product_id', $products)->delete();

            # Redirect ke halaman transaksi
            return redirect()->route('user.transaction.show', $transaction['reference']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), $th->getTrace());
            return back()->with('error', $th->getMessage());
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return back()->with('error', $e->getMessage());
        }
    }

    public function storeLelang(Request $request)
    {
        try {
            $product_auction = session('checkouted_product_auction');
            $method = $request->method;
            $address = UserAddress::find($request->addressOption);
            $product_auction = ProductAuction::whereIn('id', $product_auction)->get();

            if (!$method) {
                return back()->with('error', 'PILIH PEMBAYARAN WAJIB DIISI');
            }

            if (!$address) {
                return back()->withErrors(['error' => 'ALAMAT WAJIB DIISI']);
            }

            $tripay = new TripayController();
            $transaction = $tripay->requestTransactionLelang($method, $product_auction);

            if (isset($transaction->error)) {
                return back()->withErrors(['error' => $transaction->error]);
            }

            $transactions = TransactionOrder::create([
                'user_id' => auth()->id(),
                'user_address_id' => $address->id,
                'transaction_id' => $transaction['merchant_ref'],
                'reference_id' => $transaction['reference'],
                'total' => $transaction['amount'],
                'delivery_status' => 'selesaikan pesanan',
                'status' => $transaction['status'],
                'total_harga' => $transaction['amount_received'],
                'biaya_admin' => $transaction['total_fee'],
                'payment_method' => $transaction['payment_name']
            ]);

            # Buat Data Daftar Order
            $orders = $product_auction->map(function ($item) use ($transactions) {
                return Order::create([
                    'product_auction_id' => $item->id,
                    'transaction_order_id' => $transactions->id
                ]);
            });

            # Kirim Notifikasi
            Auth::user()->notify(new NotificationUserAuctionCheckout($transactions, $orders));

            # Redirect ke halaman transaksi
            return redirect()->route('user.transaction.show', $transaction['reference']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), $th->getTrace());
            return back()->with('error', $th->getMessage());
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return back()->with('error', $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($reference)
    {
        $tripay = new TripayController();
        $detail = $tripay->detailTransaction($reference);
        $transaction_order = TransactionOrder::where('reference_id', $reference)->first();
        $order = Order::where('transaction_order_id', $transaction_order->id)->get();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())->whereNotNull('product_id')->orderBy('created_at')->get();
        $countcart = cart::where('user_id', auth()->id())->count();
        return view('user.transactiondetail', compact('detail','order', 'countFavorite', 'countcart', 'carts', 'transaction_order'));
    }
}
