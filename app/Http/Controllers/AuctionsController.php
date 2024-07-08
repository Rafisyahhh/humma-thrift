<?php

namespace App\Http\Controllers;

use App\Models\auctions;
use App\Http\Requests\StoreauctionsRequest;
use App\Http\Requests\UpdateauctionsRequest;
use App\Models\Favorite;
use App\Models\ProductAuction;
use App\Models\ProductCategory;
use App\Notifications\Lelang;
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
        $notifications = auth()->user()->notifications;
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        return view('Landing.produk-auction', compact('auctions','user','notifications', 'countFavorite'));
    }
    public function notify()
    {
        $auctions = auctions::all();
        $user = Auth::user();
        $notifications = auth()->user()->notifications;
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        return view('user.notification', compact('auctions','user','notifications', 'countFavorite'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $product = ProductAuction::findOrFail($id);
        $auctions = auctions::all();
        $user = Auth::user();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        return view('Landing.produk-auction', compact('auctions','user', 'countFavorite'));
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
        $auctions = Auctions::orderBy('created_at', 'asc')->orderBy('auction_price', 'desc')->get();
        $user = Auth::user();

        return view('seller.produk', compact('auctions','user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editlelang(auctions $auctions)
    {
        $auctions = Auctions::orderBy('created_at', 'asc')->orderBy('auction_price', 'desc')->get();
        $user = Auth::user();

        return view('seller.produk', compact('auctions','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatelelang(UpdateauctionsRequest $request, auctions $auctions)
    {
        try {

        $dataToUpdate = [
            'status' => $request->input('status') == 1,
        ];

        $auctions->update($dataToUpdate);

        // Kirim notifikasi jika status berhasil diperbarui
        if ($auctions->status) {
            $auctions->user->notify(new Lelang($auctions));
        }
            return redirect()->route('seller.product.index')->with('success', 'lelang berhasil di pilih');
        } catch (\Throwable $th) {
            return redirect()->route('seller.product.index')->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(auctions $auctions)
    {
        //
    }
}
