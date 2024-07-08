<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCategoryPivot;
use App\Models\UserStore;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();
        $store = UserStore::all();
        $product_category_pivots = ProductCategoryPivot::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        
        return view('user.keranjang', compact('carts', 'store', 'product_category_pivots', 'countFavorite'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storecart(Product $Product)
    {
        // dd($Product);
        $dataproduct['product_id'] = $Product->id;
        $dataproduct['user_id'] = auth()->id();

        $keranjang = cart::where('product_id', $Product->id);

        if($keranjang->exists()) {
            return redirect()->back()->with('error', "Produknya udah ada di keranjang nih...");
        }

        cart::create($dataproduct);

        return redirect()->back()->with('success', 'Keranjang created successfully.');
    }

    public function cart($id)
    {
        $keranjang = cart::find($id);
        $keranjang->is_cart = !$keranjang->is_cart;
        $keranjang->save();

        return redirect()->route('cart.index')->with('succes', 'Keranjang berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cart $cart)
    {
        //
    }
}
