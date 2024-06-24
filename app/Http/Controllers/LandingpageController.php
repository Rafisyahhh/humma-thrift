<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\event;
use App\Models\Product;
use App\Models\ProductAuction;
use Illuminate\Http\Request;
use App\Models\ProductCategory;


class LandingpageController extends Controller
{
    public function index() {
        $event =  Event::all();
        $brands = Brand::all();
        $categories = ProductCategory::all();
        $product = Product::all();
        $product_auction = ProductAuction::all();
        return view('landing.home', compact('event',
        'brands',
        'categories','product','product_auction'));
    }

}
