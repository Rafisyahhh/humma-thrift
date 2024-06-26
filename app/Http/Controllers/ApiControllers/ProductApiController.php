<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductApiController extends Controller {
    //
    public function getProduct(Request $request) {
        if ($request->ajax()) {
            $data = Product::latest()->get();
            return DataTables::of($data)->make(true);
        }
    }
}