<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller {
    private Brand $brands;

    public function __construct() {
        $this->brands = new Brand();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        // $search = $request->input('search');
        // $hasRequestSearch = $request->has('search');

        // $brands = $this->brands->when($hasRequestSearch, fn($query) => $query->where("title", 'LIKE', "%{$search}%"))
        //     ->paginate(5);

        return view('admin.brand'/* compact('brands')*/);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request) {
        $data = $request->validated();
        $data['logo'] = $request->file('logo')->store('brand-logo', 'public');

        $this->brands->create($data);

        if ($request->ajax()) {
            return response("Sukses menambah data");
        } else {
            return redirect()->back()->with('success', 'Brand berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand) {
        // $brands = $this->brands->all();
        // return view('admin.brand', compact('brands'));
    }

    /**
     * Update the specified resource in storage. 
     */
    public function update(UpdateBrandRequest $request, Brand $brand) {
        $data = $request->validated();
        $oldPhotoPath = $brand->logo;

        if ($request->hasFile('logo')) {
            $foto = $request->file('logo');
            $path = $foto->store('logo', 'public');
            $data['logo'] = $path;
        }

        $brand->update($data);

        if ($brand->wasChanged('logo') && $oldPhotoPath) {
            Storage::disk('public')->delete($oldPhotoPath);
            $localFilePath = public_path('storage/' . $oldPhotoPath);
            if (File::exists($localFilePath)) {
                File::delete($localFilePath);
            }
        }

        if ($request->ajax()) {
            return response("Sukses mengubah data");
        } else {
            return redirect()->back()->with('success', 'Brand berhasil di ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Brand $brand) {
        if (Storage::disk('public')->exists($brand->logo)) {
            Storage::disk('public')->delete($brand->logo);
        }

        $brand->delete();

        if ($request->ajax()) {
            return response("Sukses menghapus data");
        } else {
            return redirect()->back()->with('success', 'Brand berhasil di hapus');
        }
    }
}