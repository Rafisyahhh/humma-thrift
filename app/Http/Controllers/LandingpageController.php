<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\event;
use App\Models\Product;
use App\Models\ProductAuction;
use App\Models\UserStore;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Database\Factories\ProductFactory;

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

    public function product(){
        $products = Product::all();
        $brands = Brand::all();
        $categories = ProductCategory::all();
        $product_auction = ProductAuction::all();
        return view('landing.produk', compact('products','brands','categories','product_auction'));
    }
    public function store(){
        $store = UserStore::all();
        return view('landing.toko', compact('store'));
    }

    public function wishlist(){
        $categories = ProductCategory::all();
        $brands = Brand::all();
        $product = Product::all();
        return view('user.wishlist', compact('categories','brands','product'));
    }
}
