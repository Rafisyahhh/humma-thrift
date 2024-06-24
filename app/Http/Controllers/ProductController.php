<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\ProductAuction;
use App\Models\ProductCategory;
use App\Models\ProductCategoryPivot;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $products = Product::all();
        $product_auctions = ProductAuction::all();
        // dd($products);
        return view('seller.produk', compact('products', 'product_auctions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $products = Product::all();
        $brands = Brand::all();
        $categories = ProductCategory::all();
        return view('seller.tambahproduk', compact('products', 'brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request) {
        dd($request->all());
        $data = collect($request->validated());
        $data->put("thumbnail", $request->thumbnail->store("uploads/thumbnails"));
        $data->put("user_id", auth()->id());

        $product_type = $request->product_type;
        $isAuction = $product_type === 'product_auctions';
        $model = $isAuction ? ProductAuction::class : Product::class;

        $fields = [
            'products' => ['user_id', 'brand_id', 'title', 'description', 'thumbnail', 'size', 'price'],
            'product_auctions' => ['user_id', 'brand_id', 'title', 'description', 'thumbnail', 'size', 'bid_price_start', 'bid_price_end']
        ];

        $productData = $model::create($data->only($fields[$product_type])->toArray());

        $galleryData = [];
        $categoryData = [];
        foreach ($request->image_galery as $image) {
            $galleryData[] = [
                $isAuction ? 'product_auction_id' : 'product_id' => $productData->id,
                'image' => $image->store('uploads/galeries')
            ];
        }
        foreach ($request->category_id as $categoryId) {
            $categoryData[] = [
                $isAuction ? 'product_auction_id' : 'product_id' => $productData->id,
                'product_category_id' => $categoryId
            ];
        }

        ProductGallery::insert($galleryData);
        ProductCategoryPivot::insert($categoryData);
        return redirect()->route("seller.product");
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) {
        //
    }
}