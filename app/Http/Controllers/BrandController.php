<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admin.brand', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        try {
        $gambar = $request->file('logo');
        if ($gambar) {
            $path_gambar = Storage::disk('public')->put('logo', $gambar);
        }

        Brand::create([
            'title' => $request->title,
            'logo' => $path_gambar,
        ]);

        return redirect()->route('brand.index')->with('success', 'Brand berhasil ditambahkan');
    } catch (\Throwable $th) {
        return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $brands = Brand::all();
        return view('admin.brand', compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        try {

        $oldPhotoPath = $brand->logo;

        $dataToUpdate = [
            'title' => $request->input('title_update'),
        ];

        if ($request->hasFile('logo_update')) {
            $foto = $request->file('logo_update');
            $path = $foto->store('logo', 'public');
            $dataToUpdate['logo'] = $path;
        }

        $brand->update($dataToUpdate);

        if ($brand->wasChanged('logo') && $oldPhotoPath) {
            Storage::disk('public')->delete($oldPhotoPath);
            $localFilePath = public_path('storage/' . $oldPhotoPath);
            if (File::exists($localFilePath)) {
                File::delete($localFilePath);
            }
        }

        return redirect()->route('brand.index')->with('success', 'Barnd berhasil di ubah');
    } catch (\Throwable $th) {
        return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
