<?php

namespace App\Http\Controllers;

use App\Models\Auctions;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Event;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\ProductAuction;
use App\Models\UserStore;
use App\Models\ProductCategory;
use App\Models\ProductCategoryPivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingpageController extends Controller {

    private function getUserCounts() {
        $userId = auth()->id();
        return [
            'countFavorite' => Favorite::where('user_id', $userId)->count(),
            'countCart' => Cart::where('user_id', $userId)->count(),
            'carts' => Cart::where('user_id', $userId)->whereNotNull('product_id')->orderBy('created_at')->get()
        ];
    }

    public function index() {
        $data = array_merge([
            'event' => Event::all(),
            'brands' => Brand::all(),
            'categories' => ProductCategory::all(),
            'product' => Product::all(),
            'favorites' => Favorite::where('user_id', auth()->id())->whereNotNull('product_id')->orderBy('created_at')->get(),
            'product_auction' => ProductAuction::all(),
        ], $this->getUserCounts());

        return view('landing.home', $data);
    }

    public function brand() {
        $data = array_merge([
            'brands' => Brand::all(),
        ], $this->getUserCounts());

        return view('landing.brand', $data);
    }

    public function store() {
        $data = array_merge([
            'store' => UserStore::all(),
        ], $this->getUserCounts());

        return view('landing.toko', $data);
    }

    public function wishlist() {
        $data = array_merge([
            'categories' => ProductCategory::all(),
            'brands' => Brand::all(),
            'product' => Product::all(),
            'favorite' => Favorite::all(),
            'product_auction' => Favorite::whereNotNull('product_auction_id')->where('user_id', auth()->id())->get(),
            'product_favorite' => Favorite::whereNotNull('product_id')->where('user_id', auth()->id())->get(),
        ], $this->getUserCounts());

        return view('user.wishlist', $data);
    }

    public function cart() {
        $data = array_merge([
            'cart' => Cart::all(),
            'product_category_pivots' => ProductCategoryPivot::all(),
        ], $this->getUserCounts());

        return view('user.keranjang', $data);
    }

    public function productRegular() {
        $products = Product::where('status', 'active')->paginate(24);
        $data = array_merge([
            'products' => $products,
            'brands' => Brand::all(),
            'categories' => ProductCategory::all(),
            'colors' => $products->pluck('color')->map('strtolower')->unique(),
            'sizes' => $products->pluck('size')->map('strtolower')->unique(),
        ], $this->getUserCounts());

        return view('Landing.produk-regular', $data);
    }

    public function productAuction() {
        $productAuction = ProductAuction::where('status', 'active')->paginate(24);
        $data = array_merge([
            'product_auction' => $productAuction,
            'brands' => Brand::all(),
            'categories' => ProductCategory::all(),
            'user' => Auth::user(),
            'colors' => $productAuction->pluck('color')->map('strtolower')->unique(),
            'sizes' => $productAuction->pluck('size')->map('strtolower')->unique(),
        ], $this->getUserCounts());

        return view('Landing.produk-auction', $data);
    }

    public function searchProductRegular(Request $request) {
        $search = $request->search;
        $products = Product::where('status', 'active')->where('title', 'like', "%$search%")->paginate(24);
        $data = array_merge([
            'products' => $products,
            'brands' => Brand::all(),
            'categories' => ProductCategory::all(),
            'search' => $search,
            'colors' => $products->pluck('color')->map('strtolower')->unique(),
            'sizes' => $products->pluck('size')->map('strtolower')->unique(),
        ], $this->getUserCounts());

        return view('Landing.produk-regular', $data);
    }

    public function searchProductAuction(Request $request) {
        $search = $request->search;
        $productAuction = ProductAuction::where('status', 'active')->where('title', 'like', "%$search%")->paginate(24);
        $productAuctionAll = ProductAuction::paginate(24);
        $data = array_merge([
            'product_auction' => $productAuction,
            'brands' => Brand::all(),
            'categories' => ProductCategory::all(),
            'search' => $search,
            'colors' => $productAuctionAll->pluck('color')->map('strtolower')->unique(),
            'sizes' => $productAuctionAll->pluck('size')->map('strtolower')->unique(),
        ], $this->getUserCounts());

        return view('Landing.produk-auction', $data);
    }
}