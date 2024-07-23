<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Favorite;
use Illuminate\Http\Request;

class HeaderController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    //
    public function cart() {
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();

        return view('layouts.partials.home.navbar.cart-links', compact('carts'))->render();
    }
    public function notification() {
        if (auth()->user()->store) {
            return view("layouts.partials.home.navbar.notifyseller-links")->render();
        }
        return view("layouts.partials.home.navbar.notify-links")->render();
    }
    public function wishlist() {
        $favorites = Favorite::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();

        return view('layouts.partials.home.navbar.wishlist-links', compact('favorites'))->render();
    }
}