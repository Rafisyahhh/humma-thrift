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
            Log::error($th->getMessage(), ['exception' => $th]);
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
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
            // Put the validated data
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

            // Redirect back
            return redirect()->back()->with('success', 'Kategori berhasil di ubah');
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), ['exception' => $th]);
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        try {
            // Delete icon
            if (Storage::disk('public')->exists($productCategory->getAttribute('icon'))) {
                Storage::disk('public')->delete($productCategory->getAttribute('icon'));
            }

            // Delete the category
            $productCategory->delete();

            // Redirect back
            return redirect()->back()->with('success', 'Kategori berhasil di hapus');
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), ['exception' => $th]);
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
