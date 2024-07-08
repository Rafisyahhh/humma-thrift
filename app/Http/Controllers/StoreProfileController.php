<?php

namespace App\Http\Controllers;

use App\Models\auctions;
use App\Models\Favorite;
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
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        
        return view('store.index', compact('store', 'isProduct', 'isProductAuction', 'countFavorite'));
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
        $user = Auth::user();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();        // $auctions = auctions::where('user_id', $user->id)->first();

        return view('user.detailproduct', compact('store', 'isProduct', 'isProductAuction','user', 'countFavorite'));
    }

    public function showStore()
    {
        $store = UserStore::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        return view('user.store', compact('store','countFavorite'));
    }
}
