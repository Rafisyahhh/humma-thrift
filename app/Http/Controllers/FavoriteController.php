<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use App\Models\ProductAuction;
use App\Notifications\UserFavorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $favorites = Favorite::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();

        return view('Landing.home', compact('favorites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }


    public function storesproduct(Request $request, Product $product) {
        $dataproduct['product_id'] = $product->id;
        $dataproduct['user_id'] = auth()->id();

        $favorite = Favorite::where('product_id', $product->id)->where('user_id', auth()->id());

        if ($favorite->exists()) {
            if ($request->ajax()) {
                return response()->json(['error' => "Produknya udah ada di favorit nih..."]);
            }
            return redirect()->back()->with('error', "Produknya udah ada di favorit nih...");
        }
        Favorite::create($dataproduct);

        if ($request->ajax()) {
            return response()->json(['success' => 'Favorite berhasil ditambahkan.']);
        }

        $product->load('user'); // Ensure the user relationship is loaded
        $product->userStore->user->notify(new UserFavorite($product));

        return redirect()->back()->with('success', 'Favorite berhasil ditambahkan.');
    }


    // LELANG
    public function storesproductAuction(ProductAuction $productAuction) {
        $dataproduct_auction['product_auction_id'] = $productAuction->id;
        $dataproduct_auction['user_id'] = auth()->id();

        $favoriteAuction = Favorite::where('product_auction_id', $productAuction->id)->where('user_id', auth()->id());

        if ($favoriteAuction->exists()) {
            return redirect()->back()->with('error', "Produknya Lelang udah ada di favorit nih...");
        }
        Favorite::create($dataproduct_auction);

        $productAuction->load('user'); // Ensure the user relationship is loaded
        $productAuction->userStore->user->notify(new UserFavorite($productAuction));

        return redirect()->back()->with('success', 'Favorite berhasil ditambahkan.');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroyProduct(Favorite $destroy) {
        if ($destroy->user_id != auth()->id()) {
            return redirect()->back()->with('error', 'Anda gagal menghapus favorit ini.');
        }
        $destroy->delete();

        return redirect()->back()->with('success', 'Favorite Berhasil Dihapus.');
    }

    // DESTROY LELANG
    public function destroyAuction(Favorite $destroyAuction) {
        if ($destroyAuction->user_id != auth()->id()) {
            return redirect()->back()->with('error', 'Anda gagal menghapus favorit ini.');
        }
        $destroyAuction->delete();

        return redirect()->back()->with('success', 'Favorite Lelang Berhasil Dihapus.');
    }

}