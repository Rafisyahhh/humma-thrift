<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Payment\TripayController;
use App\Models\Order;
use App\Models\Product;
use App\Models\UserAddress;
use App\Models\cart;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\TransactionOrder;
use App\Notifications\UserTransaksi;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $transaction = Order::latest()->get();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();
        $countcart = cart::where('user_id', auth()->id())->count();
        return view('user.order', compact('carts', 'countcart', 'countFavorite', 'transaction'));
    }

    public function indexTransaction()
    {
        $transaction = TransactionOrder::latest()->get();
        $orders = Order::with('product')
        ->orderBy('transaction_order_id')
        ->get()
        ->groupBy('transaction_order_id');

        return view('seller.transaksi', compact('transaction','orders'));
    }
    public function indexDetail($transaction)
    {
        $code = $transaction;
        $status = TransactionOrder::where('id', $transaction)->first();
        $transactions = Order::where('transaction_order_id', $transaction)->get();
        return view('seller.detailtransaction', compact('transactions', 'code', 'status'));
    }
    public function updatedetail(Request $request, $transaction)
    {
        // $transactions = TransactionOrder::where('id', $transaction)
        //     ->update([
        //         'delivery_status' => $request->status
        //     ]);

                // Ambil transaksi berdasarkan ID
                $transactionOrder = TransactionOrder::where('id', $transaction)->first();

                // Perbarui status pengiriman
                $transactionOrder->delivery_status = $request->status;
                $transactionOrder->save();

                // Kirim notifikasi jika status pengiriman adalah 'diterima'
                if ($request->status === 'diterima') {
                    $transactionOrder->user->notify(new UserTransaksi($transactionOrder));
                }


        return redirect()->back();
    }
    public function updateOrder(Request $request, $transaction)
    {
        $transactions = TransactionOrder::where('id', $transaction)
            ->update([
                'delivery_status' => $request->status
            ]);
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
