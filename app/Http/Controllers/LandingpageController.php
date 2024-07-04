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
        $product_auction = ProductAuction::all();

        return view('landing.home', compact(
            'event',
            'brands',
            'categories',
            'product',
            'product_auction'
        ));
    }

    public function brand()
    {
        $brands = Brand::all();
        return view('landing.brand', compact('brands'));
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
        // $auctions = auctions::where('user_id', $user->id)->first();
        // $notifications = auth()->user()->notifications;


        return view('landing.produk-auction', compact('product_auction', 'brands', 'categories','user'));
    }

    // Tambahkan metode regular
    public function productRegular()
    {
        $products = Product::paginate(24);
        $brands = Brand::all();
        $categories = ProductCategory::all();

        return view('landing.produk-regular', compact('products', 'brands', 'categories'));
    }

    public function store(){
        $store = UserStore::all();
        return view('landing.toko', compact('store'));
    }

    public function wishlist(){
        $categories = ProductCategory::all();
        $brands = Brand::all();
        $product = Product::all();
        $favorite = Favorite::all();
        // dd($favorite);
        $product_auction = Favorite::whereNotNull('product_auction_id')->get();
        $product_favorite = Favorite::whereNotNull('product_id')->get();
        // dd($product_auction);
        return view('user.wishlist', compact('categories','brands','product','favorite','product_auction', 'product_favorite'));
    }

    public function cart(){
        $cart = cart::all();
        $product_category_pivots = ProductCategoryPivot::all();

        return view('user.keranjang', compact('cart','product_category_pivots'));
    }
}
