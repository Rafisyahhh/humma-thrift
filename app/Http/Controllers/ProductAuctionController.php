<?php

namespace App\Http\Controllers;

use App\Models\ProductAuction;
use App\Http\Requests\StoreProductAuctionRequest;
use App\Http\Requests\UpdateProductAuctionRequest;
use App\Models\Brand;
use App\Models\ProductCategory;
use App\Models\ProductCategoryPivot;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductAuctionController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $productAuction = ProductAuction::all();
        return view('seller.produk', compact('productAuction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $productAuction = ProductAuction::all();
        return view('seller.tambahproduk', compact('productAuction'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductAuctionRequest $request) {
        try {
            $description = $request->description;

            if (!empty($description)) {
                $dom = new \DomDocument();
                $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

                $images = $dom->getElementsByTagName('img');
                foreach ($images as $k => $img) {
                    $data = $img->getAttribute('src');
                    list($type, $data) = explode(';', $data);
                    list(, $data) = explode(',', $data);
                    $data = base64_decode($data);

                    $image_name = "/uploads" . time() . $k . '.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $image_name);
                }
                $description = $dom->saveHTML();
            }

            $user = Auth::user();

            $gambar = $request->file('cover_image');
            $path_gambar = Storage::disk('public')->put('product', $gambar);


            ProductAuction::create([
                'description' => $description,
                'cover_image' => $path_gambar,
                'title' => $request->title,
                'user_id' => $user->id,
                'store_id' => $request->store_id,
                'brand_id' => $request->brand_id,
                'size' => $request->size,
                'status' => 'pending',
                'open_bid' => true,
                'bid_price_start' => $request->bid_price_start,
                'bid_price_end' => $request->bid_price_end,
            ]);


            return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductAuction $productAuction) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($productAuction) {
        $productAuction = ProductAuction::find($productAuction)->first();
        return view('seller.tambahproduk', [
            'product' => $productAuction,
            'brands' => Brand::all(),
            'categories' => ProductCategory::all(),
            'is_edit' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductAuctionRequest $request, ProductAuction $productAuction) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($productAuction) {
        $productAuction = ProductAuction::find($productAuction);
        $product_gallery = ProductGallery::where("product_auction_id", $productAuction->id)->get();
        foreach ($product_gallery as $data) {
            if (file_exists(storage_path($data->image))) {
                unlink(storage_path($data->image));
            }
            $data->delete();
        }

        ProductCategoryPivot::where("product_auction_id", $productAuction->id)->delete();

        $productAuction->delete();

        return redirect()->back()->with('success', "Sukses menghapus data");
    }
}