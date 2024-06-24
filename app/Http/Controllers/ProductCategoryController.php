<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;

class ProductCategoryController extends Controller
{
    private ProductCategory $productCategories;
    public function __construct()
    {
        $this->productCategories = new ProductCategory();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $hasRequestSearch = $request->has('search');

        $productCategories = $this->productCategories->when($hasRequestSearch, fn ($query) => $query->where("title", 'LIKE', "%{$search}%"))
            ->paginate(5);

        return view('admin.productcategory', compact('productCategories'));
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
            $data = $request->validated();
            $data['icon'] = $request->file('icon')->store('category-icon', 'public');
            $this->productCategories->create($data);

            return redirect()->back()->with('success', 'Kategori berhasil ditambahkan');
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
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        try {
            $oldPhotoPath = $productCategory->icon;

            $dataToUpdate = [
                'title' => $request->input('title'),
            ];

            if ($request->hasFile('icon')) {
                $foto = $request->file('icon');
                $path = $foto->store('icon', 'public');
                $dataToUpdate['icon'] = $path;
            }

            $productCategory->update($dataToUpdate);

            if ($productCategory->wasChanged('icon') && $oldPhotoPath) {
                Storage::disk('public')->delete($oldPhotoPath);
            }

            return redirect()->back()->with('success', 'Kategori berhasil di ubah');
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), ['exception' => $th]);
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        // Delete the category
        // If category is not used, delete the photo if it exists
        if (Storage::disk('public')->exists($productCategory->icon)) {
            Storage::disk('public')->delete($productCategory->icon);
        }
        // Delete the category
        $productCategory->delete();
        return redirect()->back()->with('success', 'Kategori berhasil di hapus');
    }
}
