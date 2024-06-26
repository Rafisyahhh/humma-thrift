<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BrandApiController extends Controller {
    //
    public function get(Request $request) {
        if ($request->ajax()) {
            $data = Brand::all();
            return DataTables::of($data)->make(true);
        }
    }
}