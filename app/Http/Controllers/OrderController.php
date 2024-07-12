<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Payment\TripayController;
use App\Models\Order;
use App\Models\Product;
use App\Models\UserAddress;
use App\Models\cart;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\TransactionOrder;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $transaction = TransactionOrder::latest()->get();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();
        $countcart = cart::where('user_id', auth()->id())->count();
        return view('user.order', compact('carts', 'countcart', 'countFavorite','transaction'));
    }

    public function indexTransaction(){
        $transaction = TransactionOrder::latest()->get();
        return view('seller.transaksi', compact('transaction'));
    }
    public function indexDetail($transaction){
        $code = $transaction;
        $status = TransactionOrder::where('transaction_id', $transaction)->first();
        $transactions = TransactionOrder::where('transaction_id', $transaction)->get();
        return view('seller.detailtransaction', compact('transactions','code','status'));
    }
    public function updatedetail(Request $request,$transaction){
        $transactions = TransactionOrder::where('transaction_id', $transaction)
        ->update([
            'delivery_status' => $request->status
        ]);
        return redirect()->back();
    }
    public function updateOrder(Request $request,$transaction){
        $transactions = TransactionOrder::where('transaction_id', $transaction)
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
