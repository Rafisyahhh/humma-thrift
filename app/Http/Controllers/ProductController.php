<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('seller.produk', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('seller.tambahproduk', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
    switch($request->type) {
      case "non-auction":
        dd("ini bukan lelang");
      break;
      case "auction":
        dd("ini lelang");
      break;
      default: break;
    }
    //dd($request->all());
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


            Product::create([
                'description' => $description,
                'cover_image' => $path_gambar,
                'title' => $request->title,
                'user_id' => $user->id,
                'store_id' => $request->store_id,
                'brand_id' => $request->brand_id,
                'size' => $request->size,
                'status' => 'pending',
                'open_bid' => false,
                'price' => $request->price,
            ]);


            return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
