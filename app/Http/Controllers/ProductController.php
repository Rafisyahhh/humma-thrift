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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $products = Product::all();
        return view('seller.produk', compact('products'));
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
        $data = collect($request->validated());
        $data->put("thumbnail", $request->thumbnail->store("uploads/thumbnails"));
        $data->put("user_id", auth()->id());
        if ($request->open_bid) {
            dd("ini lelang");
        } else {
            $productData = Product::create($data->only('user_id', 'brand_id', 'title', 'description', 'thumbnail', 'size', 'price')->toArray());
        }
        foreach ($request->cover_image as $cover_image) {
            ProductGallery::create([
                "product_id" => $productData->id,
                "image" => $cover_image->store("uploads/galeries")
            ]);
        }
        foreach ($request->category_ids as $category_id) {
            ProductCategoryPivot::create([
                'product_category_id' => $category_id,
                "product_id" => $productData->id,
            ]);
        }
        return redirect()->back();
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