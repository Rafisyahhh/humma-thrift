<?php

namespace App\Http\Controllers;

use App\Models\auctions;
use App\Models\cart;
use App\Models\UserStore;
use App\Models\Product;
use App\Models\ProductAuction;
use Auth;
use Illuminate\Http\Request;
use Jorenvh\Share\ShareFacade as Share;

class StoreProfileController extends Controller
{
    /**
     * Showing index of Store Information
     */
    public function index(UserStore $store)
    {
        $isProduct = Product::query()
            ->where('store_id', $store->id)
            ->get();
        $isProductAuction = ProductAuction::where('store_id', $store->id)->get();
        $carts = cart::where('user_id', auth()->id())
        ->whereNotNull('product_id')
        ->orderBy('created_at')
        ->get();
        $countcart = cart::where('user_id',auth()->id())->count();


        return view('store.index', compact('store', 'isProduct', 'isProductAuction','carts','countcart'));
    }

    /**
     * Showing list of the products
     */
    public function products(UserStore $store)
    {
        dd('products');
    }

    public function productDetail(UserStore $store, string $slug)
    {
        $isProduct = Product::where('slug', $slug)->first();
        $isProductAuction = ProductAuction::where('slug', $slug)->first();
        $carts = cart::where('user_id', auth()->id())
        ->whereNotNull('product_id')
        ->orderBy('created_at')
        ->get();
        $countcart = cart::where('user_id',auth()->id())->count();
        $user = Auth::user();
        // $auctions = auctions::where('user_id', $user->id)->first();
        return view('user.detailproduct', compact('store', 'isProduct', 'isProductAuction','user','carts','countcart'));
    }

    public function showStore()
    {
        $store = UserStore::all();
        return view('user.store', compact('store'));
    }
}
