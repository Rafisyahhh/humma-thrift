<?php

namespace App\Http\Controllers;

use App\Models\auctions;
use App\Http\Requests\StoreauctionsRequest;
use App\Http\Requests\UpdateauctionsRequest;
use App\Models\ProductAuction;
use App\Models\ProductCategory;
use Auth;

class AuctionsController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auctions = auctions::all();
        $user = Auth::user();

        return view('Landing.produk-auction', compact('auctions','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $product = ProductAuction::findOrFail($id);
        $auctions = auctions::all();
        $user = Auth::user();

        return view('Landing.produk-auction', compact('auctions','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreauctionsRequest $request)
{
    try {
        $product = ProductAuction::findOrFail($request->product_id);
        $user = Auth::user();

        auctions::create([
            'user_id' => $user->id,
            'product_auction_id' => $product->id,
            'auction_price' => $request->auction_price,
            'status' => false,
            'delivery_status' => 'selesaikan pesanan',
        ]);

        return redirect()->back()->with('success', 'Lelang berhasil ditambahkan');
    } catch (\Throwable $th) {
        return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
    }
}

    /**
     * Display the specified resource.
     */
    public function showSeller(auctions $auctions)
    {
        $auctions = auctions::all();
        $user = Auth::user();

        return view('seller.produk', compact('auctions','user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(auctions $auctions)
    {
        $auctions = auctions::all();
        $user = Auth::user();

        return view('seller.produk', compact('auctions','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateauctionsRequest $request, auctions $auctions)
    {
        $dataToUpdate = [
            'status' => $request->input('status'),
        ];

        $auctions->update($dataToUpdate);

        return redirect()->back()->with('success', 'lelang berhasil di pilih');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(auctions $auctions)
    {
        //
    }
}