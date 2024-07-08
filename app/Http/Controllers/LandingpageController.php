<?php

namespace App\Http\Controllers;

use App\Models\auctions;
use App\Models\Brand;
use App\Models\cart;
use App\Models\event;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\ProductAuction;
use App\Models\UserStore;
use App\Models\ProductCategory;
use App\Models\ProductCategoryPivot;
use Auth;

class LandingpageController extends Controller
{
    public function index()
    {
        $event =  Event::all();
        $brands = Brand::all();
        $categories = ProductCategory::all();
        $product = Product::all();
        $favorites = Favorite::where('user_id', auth()->id())
        ->whereNotNull('product_id')
        ->orderBy('created_at')
        ->get();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $product_auction = ProductAuction::all();

        return view('landing.home', compact(
            'event',
            'brands',
            'categories',
            'product',
            'favorites',
            'product_auction',
            'countFavorite'
        ));
    }

    public function brand()
    {
        $brands = Brand::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        return view('landing.brand', compact('brands', 'countFavorite'));
    }

    // public function product(){
    //     $products = Product::all();
    //     $brands = Brand::all();
    //     $categories = ProductCategory::all();
    //     $product_auction = ProductAuction::all();
    //     return view('landing.produk', compact('products','brands','categories','product_auction'));
    // }

    // Tambahkan metode auction
    public function productAuction()
    {
        $product_auction = ProductAuction::paginate(24);
        $brands = Brand::all();
        $categories = ProductCategory::all();
        $user = Auth::user();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        // $auctions = auctions::where('user_id', $user->id)->first();
        // $notifications = auth()->user()->notifications;

        return view('landing.produk-auction', compact('product_auction', 'brands', 'categories','user', 'countFavorite'));
    }

    // Tambahkan metode regular
    public function productRegular()
    {
        $products = Product::paginate(24);
        $brands = Brand::all();
        $categories = ProductCategory::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();

        return view('landing.produk-regular', compact('products', 'brands', 'categories', 'countFavorite'));
    }

    public function store(){
        $store = UserStore::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();

        return view('landing.toko', compact('store', 'countFavorite'));
    }

    public function wishlist(){
        $categories = ProductCategory::all();
        $brands = Brand::all();
        $product = Product::all();
        $favorite = Favorite::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $product_auction = Favorite::whereNotNull('product_auction_id')->where('user_id', auth()->id())->get();
        $product_favorite = Favorite::whereNotNull('product_id')->where('user_id', auth()->id())->get();

        return view('user.wishlist', compact('categories','brands','product','favorite','product_auction', 'product_favorite', 'countFavorite'));
    }

    public function cart(){
        $cart = cart::all();
        $product_category_pivots = ProductCategoryPivot::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();

        return view('user.keranjang', compact('cart','product_category_pivots', 'countFavorite'));
    }
}
