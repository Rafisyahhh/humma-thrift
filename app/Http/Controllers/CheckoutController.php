<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Http\Controllers\Payment\TripayController;
use App\Models\Order;
use App\Models\Product;
use App\Models\Auctions;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCheckoutRequest;
use App\Http\Requests\UpdateCheckoutRequest;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tripay = new TripayController();
        $channels = $tripay->getPaymentChannels();
        $users = Auth::user();
        $addresses = UserAddress::where('user_id', $users->id)->get();
        $product = Product::where('id',$request->product_id)->first();
        $product_auction = Auctions::where('product_auction_id',$request->productauction_id)
        ->where('status', 1)->first();
        return view('user.checkout', compact('users','addresses','product','channels','product_auction'));
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
    public function store(StoreCheckoutRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCheckoutRequest $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
