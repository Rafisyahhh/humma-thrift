<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\event;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function dashboard() {
        $event = Event::all();
        $brands = Brand::all();
        $categories = ProductCategory::all();
        return view('user.user',compact('event',
        'brands',
        'categories'));
    }
}
