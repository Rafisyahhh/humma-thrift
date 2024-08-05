<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\AboutUs;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminAboutUsController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $aboutUs = AboutUs::all();

        return view('admin.about', compact('aboutUs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $aboutUs = AboutUs::all();

        return view('admin.about', compact('aboutUs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutRequest $request) {
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


        $gambar = $request->file('image');
        $path_gambar = Storage::disk('public')->put('about', $gambar);


        AboutUs::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path_gambar,
        ]);



        if ($request->ajax()) {
            return response("Sukses menambah data");
        } else {
            return redirect()->back()->with('success', 'About Us berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutUs $aboutUs) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUs $aboutUs) {
        $aboutUs = AboutUs::all();

        return view('admin.about', compact('aboutUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutRequest $request, AboutUs $about) {
        $description = $request->input('description');

        if (!empty($description)) {
            $dom = new \DomDocument();
            $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $images = $dom->getElementsByTagName('img');
            foreach ($images as $k => $img) {
                $data = $img->getAttribute('src');
                if (strpos($data, 'data:image') === 0) {
                    list($type, $data) = explode(';', $data);
                    list(, $data) = explode(',', $data);
                    $data = base64_decode($data);

                    $image_name = "/uploads/" . time() . $k . '.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $image_name);
                }
            }
            $description = $dom->saveHTML();
        }

        $oldPhotoPath = $about->image;

        $dataToUpdate = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('about', 'public');
            $dataToUpdate['image'] = $path;
        }

        $about->update($dataToUpdate);

        if ($about->wasChanged('image') && $oldPhotoPath) {
            Storage::disk('public')->delete($oldPhotoPath);
            $localFilePath = public_path('storage/' . $oldPhotoPath);
            if (File::exists($localFilePath)) {
                File::delete($localFilePath);
            }
        }


        if ($request->ajax()) {
            return response("Sukses mengubah data");
        } else {
            return redirect()->back()->with('success', 'About Us berhasil di ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $aboutUs) {
        //
    }
}