<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\ChannelPembayaran;
use App\Http\Controllers\Payment\TripayController;
use App\Models\Order;
use App\Models\Product;
use App\Models\Auctions;
use App\Models\UserAddress;
use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCheckoutRequest;
use App\Http\Requests\UpdateCheckoutRequest;
use App\Models\Favorite;
use App\Models\ProductAuction;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = session('checkouted_product', []);
        $channel_pembayaran = ChannelPembayaran::first();

        if (!$channel_pembayaran) {
            $tripay = new TripayController();
            $channels = $tripay->getPaymentChannels();

            if (isset($channels['data'])) {
                foreach ($channels['data'] as $channelData) {
                    $channel_pembayaran = ChannelPembayaran::create([
                        'name' => $channelData['name'],
                        'channel_code' => $channelData['code'],
                        'flat' => $channelData['total_fee']['flat'],
                        'percent' => $channelData['total_fee']['percent'],
                        'icon_url' => $channelData['icon_url'],
                    ]);
                }
            }
        }

        $channel_pembayaran = ChannelPembayaran::all();
        $users = Auth::user();
        $addresses = UserAddress::where('user_id', $users->id)->get();
        $product = Product::whereIn('id', $products)->get();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();
        $countcart = cart::where('user_id', auth()->id())->count();

        return view(
            'user.checkout',
            compact(
                'users',
                'addresses',
                'product',
                'channel_pembayaran',
                'countFavorite',
                'carts',
                'countcart'
            )
        );
    }
    public function indexCoLelang(Request $request)
    {
        $productAuction = session('checkouted_product_auction', []);
        $channel_pembayaran = ChannelPembayaran::first();

        if (!$channel_pembayaran) {
            $tripay = new TripayController();
            $channels = $tripay->getPaymentChannels();

            if (isset($channels['data'])) {
                foreach ($channels['data'] as $channelData) {
                    $channel_pembayaran = ChannelPembayaran::create([
                        'name' => $channelData['name'],
                        'channel_code' => $channelData['code'],
                        'flat' => $channelData['total_fee']['flat'],
                        'percent' => $channelData['total_fee']['percent'],
                        'icon_url' => $channelData['icon_url'],
                    ]);
                }
            }
        }

        $channel_pembayaran = ChannelPembayaran::all();
        $users = Auth::user();
        $addresses = UserAddress::where('user_id', $users->id)->get();
        $product_auction = ProductAuction::whereIn('id', $productAuction)->get();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();
        $countcart = cart::where('user_id', auth()->id())->count();

        return view(
            'user.checkoutlelang',
            compact(
                'users',
                'addresses',
                'channel_pembayaran',
                'countFavorite',
                'product_auction',
                'carts',
                'countcart'
            )
        );
    }

    public function processCheckout(Request $request)
    {
        session(['checkouted_product' => $request->product_id]);
        return redirect()->route('user.checkout');
    }

    public function processCheckoutAuction(Request $request)
    {
        session(['checkouted_product_auction' => $request->product_auction_id]);
        return redirect()->route('user.checkout.lelang');
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
