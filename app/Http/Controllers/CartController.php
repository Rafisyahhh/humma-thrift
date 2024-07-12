<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCategoryPivot;
use App\Models\UserStore;
use App\Notifications\UserCart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch cart items with related products in one query
        $carts = cart::where('user_id', auth()->id())
            ->with('product')
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();

        // Group cart items by the product's user_store_id
        $cartStoreGroups = $carts->groupBy(function ($cartItem) {
            return $cartItem->product->store_id;
        })->map(function ($items, $storeId) {
            // Get the store for the current group
            $store = UserStore::find($storeId);
            return [
                'store' => $store,
                'cartItems' => $items
            ];
        });

        // Fetch all related data in one go
        $store = UserStore::all();
        $productCategoryPivots = ProductCategoryPivot::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $countcart = cart::where('user_id', auth()->id())->count();

        // Return the view with the data
        return view('user.keranjang', compact('carts', 'cartStoreGroups', 'store', 'productCategoryPivots', 'countcart', 'countFavorite'));

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
    // public function storecart(Product $Product)
    // {
    //     // dd($Product);
    //     $dataproduct['product_id'] = $Product->id;
    //     $dataproduct['user_id'] = auth()->id();

    //     $keranjang = cart::where('product_id', $Product->id);

    //     if($keranjang->exists()) {
    //         return redirect()->back()->with('error', "Produknya udah ada di keranjang nih...");
    //     }

    //     cart::create($dataproduct);

    //     return redirect()->back()->with('success', 'Keranjang created successfully.');
    // }
    public function storecart(Product $Product)
    {
        $dataproduct['product_id'] = $Product->id;
        $dataproduct['user_id'] = auth()->id();

        $keranjang = Cart::where('product_id', $Product->id)
            ->where('user_id', $dataproduct['user_id'])
            ->first();

        if ($keranjang) {
            return redirect()->back()->with('error', "Produknya udah ada di keranjang nih...");
        }

        Cart::create($dataproduct);

        $Product->userStore->user->notify(new UserCart($Product));

        return redirect()->back()->with('success', 'Keranjang berhasil dibuat.');
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
    public function deletecart(cart $cart)
    {
        //
        $cart->delete();
        return redirect()->back()->with('success', 'Sukses menghapus produk');
    }
}
