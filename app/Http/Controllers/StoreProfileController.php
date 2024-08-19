<?php

namespace App\Http\Controllers;

use App\Models\auctions;
use App\Models\Favorite;
use App\Models\cart;
use App\Models\Order;
use App\Models\UserStore;
use App\Models\Product;
use App\Models\ProductAuction;
use App\Models\Ulasan;
use Auth;
use Illuminate\Http\Request;
use Jorenvh\Share\ShareFacade as Share;
use Illuminate\Support\Facades\DB;


class StoreProfileController extends Controller {
    /**
     * Showing index of Store Information
     */
    public function index(UserStore $store) {
        $time = \Carbon\Carbon::now()->format('H:i');
        $isProduct = Product::query()
            ->where('store_id', $store->id)
            ->get();
        $isProductAuction = ProductAuction::where('store_id', $store->id)->get();
        $reviews = Ulasan::whereHas('product', function ($query) use ($store) {
            $query->where('store_id', $store->id);
        })->get();

        return view('store.index', compact('store', 'isProduct', 'isProductAuction', 'time', 'reviews'));
    }

    /**
     * Showing list of the products
     */
    public function products(UserStore $store) {
        dd('products');
    }

    public function productDetail(UserStore $store, string $slug) {
        $isProduct = Product::where('slug', $slug)->first();
        $isProductAuction = ProductAuction::where('slug', $slug)->first();
        $similarProduct = $isProduct
            ? Product::whereHas('categories', function ($query) use ($isProduct) {
                $query->where('product_category_pivots.product_category_id', $isProduct->categories->first()->id);
            })
                ->where('brand_id', $isProduct->brand_id)
                ->where('id', '!=', $isProduct->id)
                ->where('status', 'active')
                ->limit(4)
                ->get()
            : collect();
        $similarProductAuction = $isProductAuction
            ? ProductAuction::whereHas('categories', function ($query) use ($isProductAuction) {
                $query->where('product_category_pivots.product_category_id', $isProductAuction->categories->first()->id);
            })
                ->where('brand_id', $isProductAuction->brand_id)
                ->where('id', '!=', $isProductAuction->id)
                ->where('status', 'active')
                ->limit(4)
                ->get()
            : collect();

        $carts = Cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();
        $countcart = Cart::where('user_id', auth()->id())->count();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $user = Auth::user();
        $ulasan = $isProduct ? Ulasan::where('product_id', $isProduct->id)->get() : Ulasan::where('product_auction_id', $isProductAuction->id)->get();

        // Menghitung jumlah favorit per produk
        $countFavoriteProduct = $isProduct
            ? Favorite::whereHas('product', function ($query) use ($isProduct) {
                $query->where('id', $isProduct->id);
            })->count()
            : Favorite::whereHas('product', function ($query) use ($isProductAuction) {
                $query->where('id', $isProductAuction->id);
            })->count();

        return view('user.detailproduct', compact('store', 'isProduct', 'isProductAuction', 'user', 'carts', 'countcart', 'countFavorite', 'ulasan', 'countFavoriteProduct', 'similarProduct', 'similarProductAuction'));
    }


    public function showStore() {
        $stores = UserStore::all();
        $storeOrders = collect([]);
        foreach ($stores as $store) {
            $orders = Order::with(["product"])
                ->whereHas('product', function ($query) use ($store) {
                    $query->where('store_id', $store->id);
                })
                ->get();
            $storeOrders->put($store->id, $orders);
        }
        return view('user.store', compact('stores', "storeOrders"));
    }
}