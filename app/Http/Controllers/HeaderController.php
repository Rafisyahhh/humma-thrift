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
        $carts = cart::where('user_id', auth()->id())->with('product')->orderBy('created_at')->get();

        return response($carts);
    }

    public function wishlist() {
        $favorites = Favorite::where('user_id', auth()->id())->count();

        return response($favorites);
    }
}