<?php

namespace App\Http\Controllers;

use App\Models\{auctions, Product, Brand, ProductAuction, ProductCategory, ProductCategoryPivot, ProductGallery};
use App\Http\Requests\{StoreProductRequest, UpdateProductRequest};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_category_pivots = ProductCategoryPivot::all();
        $auctions = Auctions::orderBy('auction_price', 'desc')->orderBy('created_at', 'asc')->get();
        $products = Product::where("store_id", Auth::user()->store()->first()->id)->get();
        $product_auctions = ProductAuction::where("store_id", Auth::user()->store()->first()->id)->get();

        return view('seller.produk', compact('auctions', 'product_category_pivots', 'products', 'product_auctions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = ProductCategory::all();

        return view('seller.tambahproduk', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['thumbnail'] = $this->storeFile($request->file('thumbnail'), 'uploads/thumbnails');
        $data['user_id'] = Auth::id();
        $data['store_id'] = Auth::user()->getAttribute('store')->id;

        $isAuction = $request->product_type === 'product_auctions';
        $model = $isAuction ? ProductAuction::class : Product::class;

        $data['slug'] = $this->generateSlug($request->title, $model);

        DB::transaction(function () use ($request, $data, $model, $isAuction) {
            $product = $model::create($data);

            $this->storeGallery($request->image_gallery ?? [], $product->id, $isAuction);
            $this->storeCategories($request->category_id ?? [], $product->id, $isAuction);
        });

        return redirect()->route('seller.product.index')->with('success', 'Sukses menambah produk');
    }

    private function storeFile($file, $path)
    {
        return $file ? $file->store($path, 'public') : null;
    }

    private function storeGallery($images, $productId, $isAuction)
    {
        $galleryData = array_map(function ($image) use ($productId, $isAuction) {
            return [
                $isAuction ? 'product_auction_id' : 'product_id' => $productId,
                'image' => $this->storeFile($image, 'uploads/galleries')
            ];
        }, $images);

        ProductGallery::insert($galleryData);
    }

    private function storeCategories($categoryIds, $productId, $isAuction)
    {
        $categoryData = array_map(function ($categoryId) use ($productId, $isAuction) {
            return [
                $isAuction ? 'product_auction_id' : 'product_id' => $productId,
                'product_category_id' => $categoryId
            ];
        }, $categoryIds);

        ProductCategoryPivot::insert($categoryData);
    }

    private function generateSlug($title, $model)
    {
        $slug = Str::slug($title);
        $modelInstance = new $model;

        if ($modelInstance->where('slug', $slug)->exists()) {
            $slug .= '-' . Str::random(5);
        }

        return $slug;
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product_category_pivots = ProductCategoryPivot::all();
        $products = Product::where("store_id", Auth::user()->store()->first()->id)->get();
        $product_auctions = ProductAuction::where("store_id", Auth::user()->store()->first()->id)->get();
        $auctions = Auctions::orderBy('created_at', 'asc')->orderBy('auction_price', 'desc')->get();

        return view('seller.produk', compact('auctions', 'product_category_pivots', 'products', 'product_auctions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = ProductCategory::all();
        $is_edit = true;

        return view('seller.tambahproduk', compact('product', 'brands', 'categories', 'is_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $product)
    {
        $data = $request->validated();
        $data['store_id'] = Auth::user()->store()->first()->id;
        $isAuction = $request->product_type === 'product_auctions';
        $currentProduct = ProductAuction::find($product) ?: Product::find($product);
        if (!$currentProduct) {
            return redirect()->route('seller.product.index')->with('error', 'Produk tidak ditemukan');
        }

        $productArray = $currentProduct->toArray();
        if ($isAuction) {
            $productArray["bid_price_start"] = $data["bid_price_start"];
            $productArray["bid_price_end"] = $data["bid_price_end"];
        } else {
            unset($productArray["bid_price_start"], $productArray["bid_price_end"]);
        }

        if (($isAuction && $currentProduct instanceof Product) || (!$isAuction && $currentProduct instanceof ProductAuction)) {
            ProductGallery::where($isAuction ? 'product_id' : 'product_auction_id', $currentProduct->id)->delete();
            ProductCategoryPivot::where($isAuction ? 'product_id' : 'product_auction_id', $currentProduct->id)->delete();
            $currentProduct->delete();
            $currentProduct = $isAuction ? ProductAuction::create($productArray) : Product::create($productArray);
        }

        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete($currentProduct->thumbnail);
            $data['thumbnail'] = $request->thumbnail->store('uploads/thumbnails', 'public');
        }

        $currentProduct->update($data);

        if (isset($request->image_galery)) {
            $galleryData = array_map(fn ($image) => [
                $isAuction ? 'product_auction_id' : 'product_id' => $currentProduct->id,
                'image' => $image->store('uploads/galeries', 'public')
            ], $request->image_galery);

            $categoryData = array_map(fn ($categoryId) => [
                $isAuction ? 'product_auction_id' : 'product_id' => $currentProduct->id,
                'product_category_id' => $categoryId
            ], $request->category_id);

            ProductGallery::where($isAuction ? 'product_auction_id' : 'product_id', $currentProduct->id)->delete();
            ProductCategoryPivot::where($isAuction ? 'product_auction_id' : 'product_id', $currentProduct->id)->delete();
            ProductGallery::insert($galleryData);
            ProductCategoryPivot::insert($categoryData);
        }

        return redirect()->route('seller.product.index')->with('success', 'Sukses mengupdate produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $productGalleries = ProductGallery::where('product_id', $product->id)->get();
        foreach ($productGalleries as $gallery) {
            Storage::disk('public')->delete($gallery->image);
            $gallery->delete();
        }

        ProductCategoryPivot::where('product_id', $product->id)->delete();
        $product->delete();

        return redirect()->back()->with('success', 'Sukses menghapus produk');
    }

    function slugify($text)
    {
        $text = strtolower($text);
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);
        $text = trim($text, '-');
        return $text;
    }
}
