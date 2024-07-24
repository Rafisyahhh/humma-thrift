<?php

namespace App\Http\Controllers;

use App\Models\auctions;
use App\Models\Favorite;
use App\Models\cart;
use App\Models\UserStore;
use App\Models\Product;
use App\Models\ProductAuction;
use App\Models\Ulasan;
use Auth;
use Illuminate\Http\Request;
use Jorenvh\Share\ShareFacade as Share;

class StoreProfileController extends Controller {
    /**
     * Showing index of Store Information
     */
    public function index(UserStore $store) {
        $time = \Carbon\Carbon::now()->format('H:i');
        $isProduct = Product::query()
            ->where('store_id', $store->id)
            ->get();
        $isProductAuction = ProductAuction::where('store_id', $store->id)->get();
        $reviews = Ulasan::whereHas('product', function ($query) use ($store) {
            $query->where('store_id', $store->id);
        })->get();

        return view('store.index', compact('store', 'isProduct', 'isProductAuction', 'time', 'reviews'));
    }

    /**
     * Showing list of the products
     */
    public function products(UserStore $store) {
        dd('products');
    }

    public function productDetail(UserStore $store, string $slug) {
        $isProduct = Product::where('slug', $slug)->first();
        $isProductAuction = ProductAuction::where('slug', $slug)->first();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();
        $countcart = cart::where('user_id', auth()->id())->count();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $user = Auth::user();
        $ulasan = Ulasan::whereHas('product', function ($query) use ($store) {
            $query->where('store_id', $store->id);
        })->get();
        return view('user.detailproduct', compact('store', 'isProduct', 'isProductAuction', 'user', 'carts', 'countcart', 'countFavorite', 'ulasan'));
    }

    public function showStore() {
        $store = UserStore::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $countcart = cart::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();

        return view('user.store', compact('store', 'countFavorite', 'countcart', 'carts'));
    }
}