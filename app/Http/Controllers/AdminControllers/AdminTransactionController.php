<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\TransactionOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $transaction = TransactionOrder::latest()->get();
        $orders = Order::with('product')
            ->orderBy('transaction_order_id')
            ->get()
            ->groupBy('transaction_order_id');
        $orderL = Order::with('product_auction')
            ->orderBy('transaction_order_id')
            ->get()
            ->groupBy('transaction_order_id');
        return view('admin.transaction');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}