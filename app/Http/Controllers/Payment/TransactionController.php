<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\cart;
use App\Models\Favorite;
use App\Models\TransactionOrder;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $method = $request->method;
    $address = UserAddress::find($request->addressOption);
    $product = Product::find($request->product_id);
    $tripay = new TripayController();
    $transaction = $tripay->requestTransaction($method, $product);

    if (isset($transaction->error)) {
        // Handle the error appropriately, e.g., return an error response
        return back()->withErrors(['error' => $transaction->error]);
    }

    $order = TransactionOrder::create([
        'user_id' => auth()->id(),
        'product_id' => $request->product_id,
        'user_address_id' => $address->id,
        'transaction_id' => $transaction->pay_code,
        'reference_id' => $transaction->reference,
        'total' => $transaction->amount,
        'delivery_status' => 'selesaikan pesanan',
        'status' => $transaction->status,
    ]);

    return redirect()->route('user.transaction.show', ['reference' => $transaction->reference]);
}


    /**
     * Display the specified resource.
     */
    public function show($reference)
    {
        $tripay = new TripayController();
        $detail = $tripay->detailTransaction($reference);
        $transaction_order = TransactionOrder::where('reference_id', $reference)->first();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())->whereNotNull('product_id')->orderBy('created_at')->get();
        $countcart = cart::where('user_id', auth()->id())->count();
        return view('user.transactiondetail', compact('detail', 'countFavorite', 'countcart', 'carts','transaction_order'));
    }
}
