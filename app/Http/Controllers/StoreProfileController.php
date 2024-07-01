<?php

namespace App\Http\Controllers;

use App\Models\UserStore;
use App\Models\Product;
use App\Models\ProductAuction;
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

        return view('store.index', compact('store','isProduct','isProductAuction'));
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

        return view('user.detailproduct', compact('store', 'isProduct', 'isProductAuction'));
    }

    public function showStore()
    {
        $store = UserStore::all();
        return view('user.store', compact('store'));
    }
}
