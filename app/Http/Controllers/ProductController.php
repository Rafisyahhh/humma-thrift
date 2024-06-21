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
        $data = $request->validated();
        $data['thumbnail'] = $request->thumbnail->store('uploads/thumbnails');
        $data['user_id'] = auth()->id();

        $isAuction = $request->product_type === 'bid';

        $model = $isAuction ? ProductAuction::class : Product::class;
        $fields = [
            'user_id', 'brand_id', 'title', 'description',
            'thumbnail', 'size'
        ];
        $fields[] = $isAuction ? 'bid_price_start' : 'price';
        if ($isAuction) {
            $fields[] = 'bid_price_end';
        }

        $productData = $model::create(array_intersect_key($data, array_flip($fields)));

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
                'product_category_id' => $categoryId,
                $isAuction ? 'product_auction_id' : 'product_id' => $productData->id
            ];
        }

        ProductGallery::insert($galleryData);
        ProductCategoryPivot::insert($categoryData);

        return redirect()->route('seller.product');
    }

    // public function store(StoreProductRequest $request) {
    //     $data = collect($request->validated());
    //     $data->put("thumbnail", $request->thumbnail->store("uploads/thumbnails"));
    //     $data->put("user_id", auth()->id());
    //     if ($request->product_type == "bid") {
    //         $productData = ProductAuction::create($data->only('user_id', 'brand_id', 'title', 'description', 'thumbnail', 'size', 'bid_price_start', 'bid_price_end')->toArray());
    //     } else {
    //         $productData = Product::create($data->only('user_id', 'brand_id', 'title', 'description', 'thumbnail', 'size', 'price')->toArray());
    //     }
    //     foreach ($request->image_galery as $image_galery) {
    //         if ($request->product_type == "bid") {
    //             ProductGallery::create([
    //                 "product_auction_id" => $productData->id,
    //                 "image" => $image_galery->store("uploads/galeries")
    //             ]);
    //         } else {
    //             ProductGallery::create([
    //                 "product_id" => $productData->id,
    //                 "image" => $image_galery->store("uploads/galeries")
    //             ]);
    //         }
    //     }
    //     foreach ($request->category_id as $category_id) {
    //         if ($request->product_type == "bid") {
    //             ProductCategoryPivot::create([
    //                 'product_category_id' => $category_id,
    //                 'product_auction_id' => $productData->id,
    //             ]);
    //         } else {
    //             ProductCategoryPivot::create([
    //                 'product_category_id' => $category_id,
    //                 'product_id' => $productData->id,
    //             ]);
    //         }
    //     }
    //     return redirect()->route("seller.product");
    // }

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