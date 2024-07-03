<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BrandApiController extends Controller {
    //
    public function yajraGetBrand(Request $request) {
        if ($request->ajax()) {
            $data = Brand::all();
            return DataTables::of($data)->addIndexColumn()->make(true);
        }
    }
    public function store(StoreBrandRequest $request) {
        if ($request->ajax()) {
            $data = $request->validated();
            $data['logo'] = $request->file('logo')->store('brand-logo', 'public');

            Brand::create($data);

            return response("Sukses menambah data");
        }
    }
    public function update(UpdateBrandRequest $request, Brand $brand) {
        if ($request->ajax()) {
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

            return response("Sukses mengupdate data");
        }
    }
    public function destroy(Request $request, Brand $brand) {
        if ($request->ajax()) {
            if (Storage::disk('public')->exists($brand->logo)) {
                Storage::disk('public')->delete($brand->logo);
            }

            $brand->delete();

            return response("Sukses menghapus data");
        }
    }
}