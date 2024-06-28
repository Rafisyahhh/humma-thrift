<?php

namespace App\Http\Controllers;

use App\Models\auctions;
use App\Http\Requests\StoreauctionsRequest;
use App\Http\Requests\UpdateauctionsRequest;
use Auth;

class AuctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auctions = auctions::all();
        return view('auctions.index', compact('auctions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auctions = auctions::all();
        return view('user.detailproduct', compact('auctions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreauctionsRequest $request)
    {
        try {
            $user = Auth::user();

            auctions::create([
                'user_id' => $user->id,
                'product_auction_id' => $productId,
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
    public function show(auctions $auctions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(auctions $auctions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateauctionsRequest $request, auctions $auctions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(auctions $auctions)
    {
        //
    }
}
