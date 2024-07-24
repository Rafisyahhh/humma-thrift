<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\ProductAuction;
use App\Models\ProductCategory;
use Jorenvh\Share\ShareFacade as Share; // Gunakan full namespace

class DetailProductController extends Controller {
    public function showProduct() {
        $brands = Brand::all();
        $categories = ProductCategory::all();
        $product = Product::all();
        $product_auction = ProductAuction::all();

        return view('user.shop', compact(
            'brands',
            'categories',
            'product',
            'product_auction',
        ));
    }
}