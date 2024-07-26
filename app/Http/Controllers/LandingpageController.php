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
use Illuminate\Support\Str;

class LandingpageController extends Controller
{
    public function index()
    {
        $event = Event::all();
        $brands = Brand::all();
        $categories = ProductCategory::all();
        $product = Product::where('status', 'active')->get();
        $product_auction = ProductAuction::all();

        return view('landing.home', compact(
            'event',
            'brands',
            'categories',
            'product',
            'product_auction',
        ));
    }

    public function brand()
    {
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


    public function store()
    {
        $store = UserStore::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $countcart = cart::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();

        return view('landing.toko', compact('store', 'carts', 'countcart', 'countFavorite'));
    }

    public function wishlist(Request $request)
    {
        $categories = ProductCategory::all();
        $brands = Brand::all();
        $product = Product::all();
        $favorite = Favorite::all();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $product_auction = Favorite::whereNotNull('product_auction_id')->where('user_id', auth()->id())->get();
        $product_favorite = Favorite::whereNotNull('product_id')->where('user_id', auth()->id());

        if ($request->ajax()) {
            if (isset($request->filter)) {
                if ($request->filter == 'newest') {
                    $product_favorite = $product_favorite->orderBy('created_at');
                } elseif ($request->filter == 'oldest') {
                    $product_favorite = $product_favorite->orderByDesc('created_at');
                }
            }
            $product_favorite = $product_favorite->paginate(24);
            if ($product_favorite->currentPage() > $product_favorite->lastPage()) {
                return response()->json(['lastPage' => true]);
            }

            
            return view('Landing.components.wishlist-product', compact('product_favorite'))->render();
        }

        $countcart = cart::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();

        $product_favorite = $product_favorite->get();

        return view('user.wishlist', compact('categories', 'brands', 'product', 'favorite', 'countFavorite', 'product_auction', 'product_favorite', 'countcart', 'carts'));
    }

    public function cart()
    {
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
    public function productRegular(Request $request)
    {
        $products = Product::where('status', 'active');
        $colors = $products->pluck('color')->map('strtolower')->unique();
        $sizes = $products->pluck('size')->map('strtolower')->unique();

        if ($request->ajax()) {
            if (isset($request->search)) {
                $products = $products->where('title', 'like', "%$request->search%");
            }
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
            if (isset($request->sortBy)) {
                if ($request->sortBy == 'asc') {
                    $products = $products->sortBy('created_at');
                } elseif ($request->sortBy == 'desc') {
                    $products = $products->sortByDesc('created_at');
                }
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

        return view('Landing.produk-regular', compact('products', 'brands', 'categories', 'colors', 'sizes'));
    }

    // Tambahkan metode auction
    public function productAuction(Request $request)
    {
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


    public function searchProductRegular(Request $request)
    {
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

        return view('Landing.produk-regular', compact('products', 'brands', 'categories', 'search', 'colors', 'sizes'));
    }


    public function searchProductAuction(Request $request)
    {
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

    public function productSearch(Request $request)
    {
        $allRequest = $request->all();
        $search = $request->search;
        if (Str::startsWith(strtolower($search), ['/product', '/products', '/produk'])) {
            $search = Str::replaceMatches('(^[^\s]+)', '', $search);
            $allRequest['type'] = 'reguler';
            $commandSearch = true;
        } elseif (Str::startsWith(strtolower($search), ['/auction', '/auctions', '/lelang'])) {
            $search = Str::replaceMatches('(^[^\s]+)', '', $search);
            $allRequest['type'] = 'auction';
            $commandSearch = true;
        }
        $products = Product::where('status', 'active')->where('title', 'like', "%$search%");
        $product_auction = ProductAuction::where('status', 'active')->where('title', 'like', "%$search%");

        $colors = $products->pluck('color')->concat($product_auction->pluck('color'))->map('strtolower')->unique();
        $sizes = $products->pluck('size')->concat($product_auction->pluck('size'))->map('strtolower')->unique();
        $maxPrice = $products->pluck('price')->concat($product_auction->pluck('bid_price_end'))->max() ?? 1000;

        if ($request->ajax()) {
            $productResults = null;
            $productAuctionResults = null;

            if (isset($allRequest['type'])) {
                $types = explode(',', $allRequest['type']);
                if (in_array('reguler', $types)) {
                    $productResults = $products;
                }
                if (in_array('auction', $types)) {
                    $productAuctionResults = $product_auction;
                }
            } else {
                $productResults = $products;
                $productAuctionResults = $product_auction;
            }

            // Apply filters to products and product auctions if they are set
            if ($productResults) {
                if (isset($request->categories)) {
                    $productResults = $productResults->whereHas('categories', function ($q) use ($request) {
                        $q->whereIn('slug', explode(',', $request->categories));
                    });
                }
                if (isset($request->brands)) {
                    $productResults = $productResults->whereHas('brand', function ($q) use ($request) {
                        $q->whereIn('slug', explode(',', $request->brands));
                    });
                }
                if (isset($request->colors)) {
                    $productResults = $productResults->whereIn('color', explode(',', $request->colors));
                }
                if (isset($request->sizes)) {
                    $productResults = $productResults->whereIn('size', explode(',', $request->sizes));
                }
                if (isset($request->price)) {
                    $priceRange = explode('-', $request->price);
                    $productResults = $productResults->whereBetween('price', [$priceRange[0], $priceRange[1]]);
                }
                if (isset($request->sortBy)) {
                    $sortBy = $request->sortBy == 'asc' ? 'asc' : 'desc';
                    $productResults = $productResults->orderBy('created_at', $sortBy);
                }
                $productResults = $productResults->paginate(24);
            }

            if ($productAuctionResults) {
                if (isset($request->categories)) {
                    $productAuctionResults = $productAuctionResults->whereHas('categories', function ($q) use ($request) {
                        $q->whereIn('slug', explode(',', $request->categories));
                    });
                }
                if (isset($request->brands)) {
                    $productAuctionResults = $productAuctionResults->whereHas('brand', function ($q) use ($request) {
                        $q->whereIn('slug', explode(',', $request->brands));
                    });
                }
                if (isset($request->colors)) {
                    $productAuctionResults = $productAuctionResults->whereIn('color', explode(',', $request->colors));
                }
                if (isset($request->sizes)) {
                    $productAuctionResults = $productAuctionResults->whereIn('size', explode(',', $request->sizes));
                }
                if (isset($request->price)) {
                    $priceRange = explode('-', $request->price);
                    $productAuctionResults = $productAuctionResults->whereBetween('price', [$priceRange[0], $priceRange[1]]);
                }
                if (isset($request->sortBy)) {
                    $sortBy = $request->sortBy == 'asc' ? 'asc' : 'desc';
                    $productAuctionResults = $productAuctionResults->orderBy('created_at', $sortBy);
                }
                $productAuctionResults = $productAuctionResults->paginate(24);
            }

            if (($productResults && $productResults->currentPage() > $productResults->lastPage()) || ($productAuctionResults && $productAuctionResults->currentPage() > $productAuctionResults->lastPage())) {
                return response()->json(['lastPage' => true]);
            }

            $products = $productResults ?? [];
            $product_auction = $productAuctionResults ?? [];

            return view('Landing.components.products', compact('products', 'product_auction'))->render();
        }

        $products = $products->paginate(24) ?? [];
        $product_auction = $product_auction->paginate(24) ?? [];

        if (isset($allRequest['type'])) {
            $types = explode(',', $allRequest['type']);
            if (in_array('reguler', $types)) {
                $product_auction = collect([]);
            }
            if (in_array('auction', $types)) {
                $products = collect([]);
            }
        }
        $brands = Brand::all();
        $categories = ProductCategory::all();

        return view('Landing.allProduct', compact('products', 'product_auction', 'brands', 'categories', 'colors', 'sizes', 'maxPrice', 'search'));
    }
}
