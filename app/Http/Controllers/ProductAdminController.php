<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAuction;
use App\Models\ProductCategoryPivot;
use App\Models\UserStore;
use Auth;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_category_pivots = ProductCategoryPivot::all();
        $store = UserStore::all();
        $products = Product::all();
        $product_auctions = ProductAuction::all();
        return view('admin.produk', compact('products','product_auctions','product_category_pivots','store'));
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
        $product = Product::find($id);
        $product_auction = ProductAuction::find($id);

        if ($product) {
            $product_auctions = ProductAuction::all();
            return view('admin.produk', compact('product', 'product_auctions'));
        } elseif ($product_auction) {
            $products = Product::all();
            return view('admin.produk', compact('product_auction', 'products'));
        } else {
            return redirect()->route('admin.produk.index')->with('error', 'Produk atau Lelang Produk tidak ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive,sold',
        ], [
            'status.required' => 'Kolom STATUS wajib diisi.',
        ]);

        $product = Product::find($id);
        $product_auction = null;

        if (!$product) {
            $product_auction = ProductAuction::find($id);
        }

        if ($product) {
            $product->status = $request->status;
            $product->save();
            return redirect()->back()->with('success', 'Status produk berhasil diperbarui.');
        } elseif ($product_auction) {
            $product_auction->status = $request->status;
            $product_auction->save();
            return redirect()->back()->with('success', 'Status lelang produk berhasil diperbarui.');
        } else {
            return redirect()->route('admin.produk.index')->with('error', 'Produk atau Lelang Produk tidak ditemukan');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
