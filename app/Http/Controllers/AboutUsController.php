<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\AboutUs;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $aboutUs = AboutUs::all();
         return view('admin.about', compact('aboutUs'));
    }

    public function user()
    {
         $aboutUs = AboutUs::all();
         return view('user.tentang', compact('aboutUs'));
    }

    public function landingpage()
    {
         $aboutUs = AboutUs::all();
         return view('landing.about', compact('aboutUs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aboutUs = AboutUs::all();
        return view('admin.about', compact('aboutUs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutRequest $request)
    {
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


            $gambar = $request->file('image');
            $path_gambar = Storage::disk('public')->put('about', $gambar);


            AboutUs::create([
                'description' => $request->description,
                'image' => $path_gambar,
            ]);


            return redirect()->back()->with('success', 'About Us berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUs $aboutUs)
    {
        $aboutUs = AboutUs::all();
        return view('admin.about', compact('aboutUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutRequest $request, AboutUs $about)
    {
        try{
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
                'description' => $request->input('description_update'),
            ];

            if ($request->hasFile('image_update')) {
                $image = $request->file('image_update');
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

            return redirect()->back()->with('success', 'About Us berhasil di ubah');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $aboutUs)
    {
        //
    }
}
