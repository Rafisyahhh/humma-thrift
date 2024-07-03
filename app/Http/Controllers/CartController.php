<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = cart::where('user_id',auth()->id())
                    ->whereNotNull('product_id')
                    ->orderBy('created_at')
                    ->get();
        return view('user.keranjang',compact('cart'));

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