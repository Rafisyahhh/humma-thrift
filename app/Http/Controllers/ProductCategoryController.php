<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = ProductCategory::when($request->has('search'), function ($query) use ($request) {
            $a = $request->input('search');
            return $query->where('title', 'LIKE', "%$a%");
        })->paginate(5);

        return view('admin.productcategory', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = ProductCategory::all();
        return view('admin.productcategory', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductCategoryRequest $request)
    {
        try {
            $gambar = $request->file('icon');
        if ($gambar) {
            $path_gambar = Storage::disk('public')->put('icon', $gambar);
        }

        ProductCategory::create([
            'title' => $request->title,
            'icon' => $path_gambar,
        ]);
            return redirect()->route('category.index')->with('success', 'Kategori berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        $categories = ProductCategory::all();
        return view('admin.productcategory', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory,$id)
    {
        try {
            $category = ProductCategory::findOrFail($id);
            $oldPhotoPath = $category->icon;

        $dataToUpdate = [
            'title' => $request->input('title'),
        ];

        if ($request->hasFile('icon')) {
            $foto = $request->file('icon');
            $path = $foto->store('icon', 'public');
            $dataToUpdate['icon'] = $path;
        }

        $category->update($dataToUpdate);

        if ($category->wasChanged('icon') && $oldPhotoPath) {
            Storage::disk('public')->delete($oldPhotoPath);
            $localFilePath = public_path('storage/' . $oldPhotoPath);
            if (File::exists($localFilePath)) {
                File::delete($localFilePath);
            }
        }
            return redirect()->route('category.index')->with('success', 'Kategori berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory, $id)
    {
        // Delete the category
        // If category is not used, delete the photo if it exists
        if (Storage::disk('public')->exists($productCategory->icon)) {
            Storage::disk('public')->delete($productCategory->icon);
        }
        // Delete the category
        ProductCategory::findOrFail($id)->delete();
        return redirect()->route('category.index')->with('success', 'Kategori berhasil di hapus');
    }
}
