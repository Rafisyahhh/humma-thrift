<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\ProductCategory;
use Yajra\DataTables\Facades\DataTables;

class YajraController extends Controller
{
    //
    public function brands(Request $request) {
        if ($request->ajax()) {
            $data = Brand::all();
            return DataTables::of($data)->addIndexColumn()->make(true);
        }
    }
    public function categories(Request $request) {
        if ($request->ajax()) {
            $data = ProductCategory::all();
            return DataTables::of($data)->addIndexColumn()->make(true);
        }
    }
}
