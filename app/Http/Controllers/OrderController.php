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
use App\Models\ProductAuction;
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
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $carts = Cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();
        $countcart = Cart::where('user_id', auth()->id())->count();

        $deliveryStatus = $request->input('delivery_status');

        if ($request->ajax()) {
            $queryOrders = Order::latest();
            $queryAuctions = Order::latest();
            $queryOrders = Order::latest()->whereHas('transaction_order', function ($q) use ($deliveryStatus) {
                $q->where('user_id', Auth::user()->id);
                if (!empty($deliveryStatus)) {
                    $q->where('delivery_status', $deliveryStatus);
                }
            });

            $queryAuctions = Order::latest()->whereHas('transaction_order', function ($q) use ($deliveryStatus) {
                $q->where('user_id', Auth::user()->id)->where('product_auction_id','!=',null);
                if (!empty($deliveryStatus)) {
                    $q->where('delivery_status', $deliveryStatus);
                }
            });

            $orders = $queryOrders->get();
            $auctions = $queryAuctions->get();

            return response()->json([
                'orderHTML' => view('user.filter', compact('orders'))->render(),
                'auctionHTML' => view('user.filterauctions', compact('auctions'))->render(),
            ]);
        }

        $orders = Order::latest()->get();
        $auctions = Order::latest()->get();

        return view('user.order', compact('carts', 'countcart', 'countFavorite', 'orders', 'auctions'));
    }


    public function indexTransaction()
    {
        $transaction = TransactionOrder::latest()->get();
        $orders = Order::with('product')
            ->orderBy('transaction_order_id')
            ->get()
            ->groupBy('transaction_order_id');
        $orderL = Order::with('product_auction')
            ->orderBy('transaction_order_id')
            ->get()
            ->groupBy('transaction_order_id');

        return view('seller.transaksi', compact('transaction', 'orders', 'orderL'));
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
        $transactionOrder = TransactionOrder::where('id', $transaction)->first();

        $transactionOrder->delivery_status = $request->status;
        $transactionOrder->save();

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
