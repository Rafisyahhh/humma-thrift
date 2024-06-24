<?php

namespace App\Http\Controllers;

use App\Models\{Product, Brand, ProductAuction, ProductCategory, ProductCategoryPivot, ProductGallery};
use App\Http\Requests\{StoreProductRequest, UpdateProductRequest};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('seller.produk', [
            'products' => Product::all(),
            'product_auctions' => ProductAuction::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('seller.tambahproduk', [
            'products' => Product::all(),
            'brands' => Brand::all(),
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request) {
        $data = $request->validated();
        $data['thumbnail'] = $request->thumbnail->store('uploads/thumbnails', 'public');
        $data['user_id'] = Auth::id();

        $isAuction = $request->product_type === 'product_auctions';
        $model = $isAuction ? ProductAuction::class : Product::class;
        $fields = $isAuction
            ? ['user_id', 'brand_id', 'title', 'description', 'thumbnail', 'size', 'color', 'bid_price_start', 'bid_price_end']
            : ['user_id', 'brand_id', 'title', 'description', 'thumbnail', 'size', 'color', 'price'];

        $product = $model::create($data);

        $galleryData = array_map(fn($image) => [
            $isAuction ? 'product_auction_id' : 'product_id' => $product->id,
            'image' => $image->store('uploads/galeries', 'public')
        ], $request->image_galery);

        $categoryData = array_map(fn($categoryId) => [
            $isAuction ? 'product_auction_id' : 'product_id' => $product->id,
            'product_category_id' => $categoryId
        ], $request->category_id);

        ProductGallery::insert($galleryData);
        ProductCategoryPivot::insert($categoryData);

        return redirect()->route('seller.product.index')->with('success', 'Sukses menambah produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) {
        return view('seller.tambahproduk', [
            'product' => $product,
            'brands' => Brand::all(),
            'categories' => ProductCategory::all(),
            'is_edit' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $product) {
        $data = $request->validated();
        $isAuction = $request->product_type === 'product_auctions';
        $currentProduct = Product::find($product) ?: ProductAuction::find($product);

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

        $galleryData = array_map(fn($image) => [
            $isAuction ? 'product_auction_id' : 'product_id' => $currentProduct->id,
            'image' => $image->store('uploads/galeries', 'public')
        ], $request->image_galery);

        $categoryData = array_map(fn($categoryId) => [
            $isAuction ? 'product_auction_id' : 'product_id' => $currentProduct->id,
            'product_category_id' => $categoryId
        ], $request->category_id);

        ProductGallery::where($isAuction ? 'product_auction_id' : 'product_id', $currentProduct->id)->delete();
        ProductCategoryPivot::where($isAuction ? 'product_auction_id' : 'product_id', $currentProduct->id)->delete();
        ProductGallery::insert($galleryData);
        ProductCategoryPivot::insert($categoryData);

        return redirect()->route('seller.product.index')->with('success', 'Sukses mengupdate produk');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) {
        $productGalleries = ProductGallery::where('product_id', $product->id)->get();
        foreach ($productGalleries as $gallery) {
            Storage::disk('public')->delete($gallery->image);
            $gallery->delete();
        }

        ProductCategoryPivot::where('product_id', $product->id)->delete();
        $product->delete();

        return redirect()->back()->with('success', 'Sukses menghapus produk');
    }
}