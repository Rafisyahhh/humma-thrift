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
        $data = $request->validated();
        $data['icon'] = $request->file('icon')->store('category-icon', 'public');
        $this->productCategories->create($data);

        if ($request->ajax()) {
            return response("Sukses menambah data");
        } else {
            return redirect()->back()->with('success', 'Kategori berhasil ditambahkan');
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
        $data = collect($request->validated());

        // Substitute the last icon with new icon
        if ($request->hasFile('icon')) {
            if (Storage::disk('public')->exists($productCategory->getAttribute('icon'))) {
                Storage::disk('public')->delete($productCategory->getAttribute('icon'));
            }

                // Store the new icon
            $data->put('icon', $request->file('icon')->store('category-icon', 'public'));
        }

            // Update the category
        $productCategory->update($data->toArray());

        if ($request->ajax()) {
            return response("Sukses mengubah data");
        } else {
            return redirect()->back()->with('success', 'Kategori berhasil di ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        if (Storage::disk('public')->exists($productCategory->getAttribute('icon'))) {
            Storage::disk('public')->delete($productCategory->getAttribute('icon'));
        }

        // Delete the category
        $productCategory->delete();

        if ($request->ajax()) {
            return response("Sukses menghapus data");
        } else {
            return redirect()->back()->with('success', 'Kategori berhasil di hapus');
        }
    }
}
