<?php

namespace App\Http\Controllers;

use App\Http\Requests\HistoryRequest;
use App\Models\cart;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\TransactionOrder;
use App\Models\Ulasan;
use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\bn_BD\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use NumberFormatter;
class HistoryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $transactions = TransactionOrder::where('user_id', auth()->id())
                                    ->where('delivery_status', 'selesai')
                                    ->with('order') // Eager load orders relationship
                                        ->get();

    $user = Auth::user();

    // Create an associative array to store review status for each product
    $reviewedProducts = [];

    foreach ($transactions as $transaction) {
        foreach ($transaction->order as $order) {
            // Check if the user has already reviewed the product
            $hasReviewed = Ulasan::where('user_id', $user->id)
                                 ->where('product_id', $order->product_id)
                                 ->exists();
            $reviewedProducts[$order->product_id] = $hasReviewed;
        }
    }
    // Debug output
    // dd($reviewedProducts);

    return view('user.history', compact('transactions', 'reviewedProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    public function store(Request $request) {

        $validate = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'star' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:1000',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->with('error', "Harap isikan kolom masukan dengan benar!")
                ->withErrors($validate->errors())
                ->withInput($request->input());
        }

        $data = collect($validate->validated());
        $data->put('user_id', Auth::id());

        Ulasan::create($data->toArray());

        return redirect()->back()->with('success', 'Ulasan Anda berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function showProduct($productId)
    {
        $product = Product::findOrFail($productId);
        $user = Auth::user();

        // Check if the user has already reviewed the product
        $hasReviewed = Ulasan::where('product_id', $productId)
                             ->where('user_id', $user->id)
                             ->exists();

        return view('product.show', compact('product', 'hasReviewed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id) {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }

    public static function formatTanggal($tanggal) {

    }
}
