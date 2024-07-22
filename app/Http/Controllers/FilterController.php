<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FilterController extends Controller {
    //
    public function productRegular(Request $request) {
        dd($request->all());
        $products = Product::where('status', 'active')->paginate(24);

        if ($request->ajax()) {
            return view('Landing.components.product-regular', compact('products'))->render();
        }
    }
}