<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::where('user_id', auth()->id())
                            ->whereNotNull('product_id')
                            ->orderB('created_at')
                            ->get();

        return view('Landing.home', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function storesproduct(Product $product)
    {
        $dataproduct['product_id'] = $product->id;
        $dataproduct['user_id'] = auth()->id();

        Favorite::create($dataproduct);

        return redirect()->route('user.wishlist')->with('success', 'Favorite created successfully.');
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
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        //
    }
}
