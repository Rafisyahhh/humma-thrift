<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAuction;
use App\Models\User;
use App\Models\UserStore;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countproduct = Product::count();
        $countproductauction = ProductAuction::count();
        $countseller = UserStore::count();
        $countuser = User::count();
        return view('admin.index', compact('countproduct','countproductauction','countseller','countuser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
