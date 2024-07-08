<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use App\Models\ProductAuction;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favorites = Favorite::where('user_id', auth()->id())
                    ->whereNotNull('product_id')
                    ->orderBy('created_at')
                    ->get();

        // dd($favorites);
        // $product = Product::where('user_id', auth()->id())
        //                     ->whereNotNull('product_id')
        //                     ->orderB('created_at')
        //                     ->get();

        // $productAuction = ProductAuction::where('user_id', auth()->id())
        //                     ->whereNotNull('productAuction_id')
        //                     ->orderB('created_at')
        //                     ->get();

        return view('Landing.home', compact('favorites'));
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

        $favorite = Favorite::where('product_id', $product->id)->where('user_id', auth()->id());

        if($favorite->exists()) {
            return redirect()->back()->with('error', "Produknya udah ada di favorit nih...");
        }
        Favorite::create($dataproduct);

        return redirect()->back()->with('success', 'Favorite created successfully.');
    }


// LELANG
    public function storesproductAuction(ProductAuction $productAuction)
    {
        $dataproduct_auction['product_auction_id'] = $productAuction->id;
        $dataproduct_auction['user_id'] = auth()->id();

        $favoriteAuction = Favorite::where('product_auction_id', $productAuction->id)->where('user_id', auth()->id());

        if($favoriteAuction->exists()) {
            return redirect()->back()->with('error', "Produknya udah ada di favorit nih...");
        }
        Favorite::create($dataproduct_auction);

        return redirect()->back()->with('success', 'Favorite created successfully.');
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
