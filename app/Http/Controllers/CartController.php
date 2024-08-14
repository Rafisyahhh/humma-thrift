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

class CartController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Fetch cart items with related products in one query
        $carts = cart::where('user_id', auth()->id())
            ->with('product')
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();

        // Group cart items by the product's user_store_id
        $cartStoreGroups = $carts->groupBy('product.store_id')->map(function ($cartItems, $storeId) {
            $store = UserStore::find($storeId);
            return compact('store', 'cartItems');
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
    public function create() {
    }

    public function storecart(Request $request, Product $product) {
        $dataproduct['product_id'] = $product->id;
        $dataproduct['user_id'] = auth()->id();

        $keranjang = Cart::where('product_id', $product->id)
            ->where('user_id', $dataproduct['user_id'])
            ->first();

        if ($keranjang) {
            if ($request->ajax()) {
                return response()->json(['error' => "Produknya udah ada di keranjang nih..."]);
            }

            return redirect()->back()->with('error', "Produknya udah ada di keranjang nih...");
        }

        Cart::create($dataproduct);

        if ($request->ajax()) {
            $carts = cart::where('user_id', auth()->id())->with('product')->orderBy('created_at')->get();
            return response()->json([
                'success' => 'Keranjang berhasil dibuat.',
                'type' => 'cart',
                'data' => $carts
            ]);
        }

        $product->userStore->user->notify(new UserCart($product));



        return redirect()->back()->with('success', 'Keranjang berhasil dibuat...');
    }

    public function cart($id) {
        $keranjang = cart::find($id);
        $keranjang->is_cart = !$keranjang->is_cart;
        $keranjang->save();

        return redirect()->route('cart.index')->with('succes', 'Keranjang berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(cart $cart) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cart $cart) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cart $cart) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletecart(cart $cart) {
        //
        $cart->delete();
        return redirect()->back()->with('success', 'Sukses menghapus produk');
    }
}