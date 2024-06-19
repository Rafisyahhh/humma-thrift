<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $event = Event::when($request->has('search'), function ($query) use ($request) {
            $a = $request->input('search');
            return $query->where('title', 'LIKE', "%$a%");
        })->paginate(5);
        return view('admin.event',compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $event = Event::all();
        return view('admin.event', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $gambar = $request->file('foto');
        if ($gambar) {
            $path_gambar = Storage::disk('public')->put('foto', $gambar);
        }

        Event::create([
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'foto' => $path_gambar,
        ]);
            return redirect()->back()->with('success', 'Kategori berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(event $event)
    {
        $event = Event::all();
        return view('admin.event', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $event = event::findOrFail($id);
            $oldPhotoPath = $event->getAttribute('icon');

        $dataToUpdate = [
            'judul' => $request->input('judul'),
            'subjudul' => $request->input('subjudul'),
        ];

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $path = $foto->store('foto', 'public');
            $dataToUpdate['foto'] = $path;
        }

        $event->update($dataToUpdate);

        if ($event->wasChanged('foto') && $oldPhotoPath) {
            Storage::disk('public')->delete($oldPhotoPath);
            $localFilePath = public_path('storage/' . $oldPhotoPath);
            if (File::exists($localFilePath)) {
                File::delete($localFilePath);
            }
        }
            return redirect()->back()->with('success', 'Kategori berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(event $event, $id)
    {
        if (Storage::disk('public')->exists($event->getAttribute('foto'))) {
            Storage::disk('public')->delete($event->getAttribute('foto'));
        }
        // Delete the category
        Event::findOrFail($id)->delete();
        return redirect()->route('event.index')->with('success', 'Kategori berhasil di hapus');
    }
}
