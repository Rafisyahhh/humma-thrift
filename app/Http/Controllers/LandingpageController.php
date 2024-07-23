<?php

namespace App\Http\Controllers;

use App\Models\auctions;
use App\Models\Brand;
use App\Models\cart;
use App\Models\event;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\ProductAuction;
use App\Models\UserStore;
use App\Models\ProductCategory;
use App\Models\ProductCategoryPivot;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LandingpageController extends Controller {
    public function index() {
        $event = Event::all();
        $brands = Brand::all();
        $categories = ProductCategory::all();
        $product = Product::where('status', 'active')->get();
        $favorites = Favorite::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $countcart = cart::where('user_id', auth()->id())->count();
        $product_auction = ProductAuction::all();

        return view('landing.home', compact(
            'event',
            'brands',
            'categories',
            'product',
            'favorites',
            'product_auction',
            'countFavorite',
            'countcart',
            'carts'
        ));
    }

    public function brand() {
        $brands = Brand::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $countcart = cart::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();

        return view('landing.brand', compact('brands', 'countFavorite', 'carts', 'countcart'));
    }

    // public function product(){
    //     $products = Product::all();
    //     $brands = Brand::all();
    //     $categories = ProductCategory::all();
    //     $product_auction = ProductAuction::all();
    //     return view('landing.produk', compact('products','brands','categories','product_auction'));
    // }


    public function store() {
        $store = UserStore::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $countcart = cart::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();

        return view('landing.toko', compact('store', 'carts', 'countcart', 'countFavorite'));
    }

    public function wishlist() {
        $categories = ProductCategory::all();
        $brands = Brand::all();
        $product = Product::all();
        $favorite = Favorite::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $product_auction = Favorite::whereNotNull('product_auction_id')->where('user_id', auth()->id())->get();
        $product_favorite = Favorite::whereNotNull('product_id')->where('user_id', auth()->id())->get();
        $countcart = cart::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();

        return view('user.wishlist', compact('categories', 'brands', 'product', 'favorite', 'product_auction', 'product_favorite', 'carts', 'countcart', 'countFavorite'));
    }

    public function cart() {
        $cart = cart::all();
        $product_category_pivots = ProductCategoryPivot::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $countcart = cart::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();

        return view('user.keranjang', compact('cart', 'product_category_pivots', 'carts', 'countcart', 'countFavorite'));
    }

    // Tambahkan metode regular
    public function productRegular(Request $request) {
        $products = Product::where('status', 'active');
        $colors = $products->pluck('color')->map('strtolower')->unique();
        $sizes = $products->pluck('size')->map('strtolower')->unique();

        if ($request->ajax()) {
            if (isset($request->categories)) {
                $products = $products->whereHas('categories', function ($q) use ($request) {
                    $q->whereIn('slug', explode(',', $request->categories));
                });
            }
            if (isset($request->brands)) {
                $products = $products->whereHas('brand', function ($q) use ($request) {
                    $q->whereIn('slug', explode(',', $request->brands));
                });
            }
            if (isset($request->colors)) {
                $products = $products->whereIn('color', explode(',', $request->colors));
            }
            if (isset($request->sizes)) {
                $products = $products->whereIn('size', explode(',', $request->sizes));
            }
            if (isset($request->price)) {
                $products = $products->where('price', '>=', explode('-', $request->price)[0])->where('price', '<=', explode('-', $request->price)[1]);
            }
            $products = $products->paginate(24);
            if ($products->currentPage() > $products->lastPage()) {
                return response()->json(['lastPage' => true]);
            }
            return view('Landing.components.product-regular', compact('products'))->render();
        }

        $products = $products->paginate(24);
        $brands = Brand::all();
        $categories = ProductCategory::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $countcart = cart::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();

        return view('Landing.produk-regular', compact('products', 'brands', 'categories', 'countcart', 'carts', 'countFavorite', 'colors', 'sizes'));
    }

    // Tambahkan metode auction
    public function productAuction(Request $request) {
        $product_auction = ProductAuction::where('status', 'active');

        $colors = $product_auction->pluck('color')->map('strtolower')->unique();
        $sizes = $product_auction->pluck('size')->map('strtolower')->unique();

        if ($request->ajax()) {
            if (isset($request->categories)) {
                $product_auction = $product_auction->whereHas('categories', function ($q) use ($request) {
                    $q->whereIn('slug', explode(',', $request->categories));
                });
            }
            if (isset($request->brands)) {
                $product_auction = $product_auction->whereHas('brand', function ($q) use ($request) {
                    $q->whereIn('slug', explode(',', $request->brands));
                });
            }
            if (isset($request->colors)) {
                $product_auction = $product_auction->whereIn('color', explode(',', $request->colors));
            }
            if (isset($request->sizes)) {
                $product_auction = $product_auction->whereIn('size', explode(',', $request->sizes));
            }
            if (isset($request->priceStart)) {
                $product_auction = $product_auction->where('bid_price_start', '>=', explode('-', $request->priceStart)[0])->where('bid_price_start', '<=', explode('-', $request->priceStart)[1]);
            }
            if (isset($request->priceEnd)) {
                $product_auction = $product_auction->where('bid_price_end', '>=', explode('-', $request->priceEnd)[0])->where('bid_price_end', '<=', explode('-', $request->priceEnd)[1]);
            }
            $product_auction = $product_auction->paginate(24);
            if ($product_auction->currentPage() > $product_auction->lastPage()) {
                return response()->json(['lastPage' => true]);
            }
            return view('Landing.components.product-auction', compact('product_auction'))->render();
        }

        $product_auction = $product_auction->paginate(24);
        $brands = Brand::all();
        $categories = ProductCategory::all();
        $countcart = cart::where('user_id', auth()->id())->count();
        $user = Auth::user();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();
        $auctions = auctions::all();
        // $auctions = auctions::where('user_id', $user->id)->first();
        // $notifications = auth()->user()->notifications;

        return view('Landing.produk-auction', compact('product_auction', 'brands', 'categories', 'user', 'countcart', 'carts', 'countFavorite', 'colors', 'sizes', 'auctions'));
    }



    public function searchProductRegular(Request $request) {
        $search = $request->search;
        $products = Product::where('status', 'active')->where('title', 'like', "%$search%");

        $colors = $products->pluck('color')->map('strtolower')->unique();
        $sizes = $products->pluck('size')->map('strtolower')->unique();

        if ($request->ajax()) {
            if (isset($request->categories)) {
                $products = $products->whereHas('categories', function ($q) use ($request) {
                    $q->whereIn('slug', explode(',', $request->categories));
                });
            }
            if (isset($request->brands)) {
                $products = $products->whereHas('brand', function ($q) use ($request) {
                    $q->whereIn('slug', explode(',', $request->brands));
                });
            }
            if (isset($request->colors)) {
                $products = $products->whereIn('color', explode(',', $request->colors));
            }
            if (isset($request->sizes)) {
                $products = $products->whereIn('size', explode(',', $request->sizes));
            }
            if (isset($request->price)) {
                $products = $products->where('price', '>=', explode('-', $request->price)[0])->where('price', '<=', explode('-', $request->price)[1]);
            }
            $products = $products->paginate(24);
            if ($products->currentPage() > $products->lastPage()) {
                return response()->json(['lastPage' => true]);
            }
            return view('Landing.components.product-regular', compact('products'))->render();
        }

        $products = $products->paginate(24);

        $brands = Brand::all();
        $categories = ProductCategory::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $countcart = cart::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();

        return view('Landing.produk-regular', compact('products', 'brands', 'categories', 'countcart', 'carts', 'countFavorite', 'search', 'colors', 'sizes'));
    }


    public function searchProductAuction(Request $request) {
        $search = $request->search;
        $product_auction = ProductAuction::where('status', 'active')->where('title', 'like', "%$search%");
        $product_auction2 = ProductAuction::all();

        $colors = $product_auction2->pluck('color')->map('strtolower')->unique();
        $sizes = $product_auction2->pluck('size')->map('strtolower')->unique();

        if ($request->ajax()) {
            if (isset($request->categories)) {
                $product_auction = $product_auction->whereHas('categories', function ($q) use ($request) {
                    $q->whereIn('slug', explode(',', $request->categories));
                });
            }
            if (isset($request->brands)) {
                $product_auction = $product_auction->whereHas('brand', function ($q) use ($request) {
                    $q->whereIn('slug', explode(',', $request->brands));
                });
            }
            if (isset($request->colors)) {
                $product_auction = $product_auction->whereIn('color', explode(',', $request->colors));
            }
            if (isset($request->sizes)) {
                $product_auction = $product_auction->whereIn('size', explode(',', $request->sizes));
            }
            if (isset($request->priceStart)) {
                $product_auction = $product_auction->where('bid_price_start', '>=', explode('-', $request->priceStart)[0])->where('bid_price_start', '<=', explode('-', $request->priceStart)[1]);
            }
            if (isset($request->priceEnd)) {
                $product_auction = $product_auction->where('bid_price_end', '>=', explode('-', $request->priceEnd)[0])->where('bid_price_end', '<=', explode('-', $request->priceEnd)[1]);
            }
            $product_auction = $product_auction->paginate(24);
            if ($product_auction->currentPage() > $product_auction->lastPage()) {
                return response()->json(['lastPage' => true]);
            }
            return view('Landing.components.product-auction', compact('product_auction'))->render();
        }

        $product_auction = $product_auction->paginate(24);

        $brands = Brand::all();
        $categories = ProductCategory::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $countcart = cart::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();


        return view('Landing.produk-auction', compact('product_auction', 'brands', 'categories', 'countcart', 'carts', 'countFavorite', 'search', 'colors', 'sizes'));
    }
}
