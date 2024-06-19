<?php

namespace App\Http\Controllers;

use App\Models\UserStore;
use Illuminate\Http\Request;

class StoreProfileController extends Controller
{
    /**
     * Showing index of Store Information
     */
    public function index(UserStore $store)
    {
        return view('store.index', compact('store'));
    }

    /**
     * Showing list of the products
     */
    public function products(UserStore $store)
    {
        dd('products');
    }
}
