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
    // public function index(Request $request)
    // {
    //     $transaction = Order::latest()->get();
    //     $countFavorite = Favorite::where('user_id', auth()->id())->count();
    //     $carts = cart::where('user_id', auth()->id())
    //         ->whereNotNull('product_id')
    //         ->orderBy('created_at')
    //         ->get();
    //     $countcart = cart::where('user_id', auth()->id())->count();
    //     if ($request->ajax()) {

    //     }
    //     // $deliveryStatus = $request->input('delivery_status');
    //     // $query = Order::latest();
    //     // if ($deliveryStatus) {
    //     //     $query->whereHas('transaction_order', function ($q) use ($deliveryStatus) {
    //     //         $q->where('delivery_status', $deliveryStatus);
    //     //     });
    //     // }
    //     // $transaction = $query->get();

    //     return view('user.order', compact('carts', 'countcart', 'countFavorite', 'transaction'));
    // }

    // benar 1
    // public function index(Request $request)
    // {
    //     $countFavorite = Favorite::where('user_id', auth()->id())->count();
    //     $carts = Cart::where('user_id', auth()->id())
    //         ->whereNotNull('product_id')
    //         ->orderBy('created_at')
    //         ->get();
    //     $countcart = Cart::where('user_id', auth()->id())->count();

    //     if ($request->ajax()) {
    //         $deliveryStatus = $request->input('delivery_status');
    //         $auctionStatus = $request->input('auction_status');

    //         $query = Order::latest();
    //         if ($deliveryStatus) {
    //             $query->whereHas('transaction_order', function ($q) use ($deliveryStatus) {
    //                 $q->where('delivery_status', $deliveryStatus);
    //             });
    //         }
    //         if ($auctionStatus) {
    //             $query->whereHas('product_auction', function ($q) use ($auctionStatus) {
    //                 $q->where('auction_status', $auctionStatus);
    //             });
    //         }
    //         $transaction = $query->get();

    //         // Render the partial view with the filtered transactions
    //         return view('user.filter', compact('transaction'))->render();
    //     }

    //     $transaction = Order::latest()->get();

    //     return view('user.order', compact('carts', 'countcart', 'countFavorite', 'transaction'));
    // }


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

        if ($deliveryStatus) {
            $queryOrders->whereHas('transaction_order', function ($q) use ($deliveryStatus) {
                $q->where('delivery_status', $deliveryStatus);
            });

            $queryAuctions->whereHas('transaction_order', function ($q) use ($deliveryStatus) {
                $q->where('delivery_status', $deliveryStatus);
            });
        }

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
