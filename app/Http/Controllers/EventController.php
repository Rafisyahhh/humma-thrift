<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $events = Event::when($request->has('search'), function ($query) use ($request) {
            $searchTerm = $request->input('search');
            return $query->where('title', 'LIKE', "%$searchTerm%");
        })->paginate(5);

        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        try {
            $path_gambar = null;
            if ($request->hasFile('foto')) {
                $gambar = $request->file('foto');
                $path_gambar = Storage::disk('public')->put('foto', $gambar);
            }

            Event::create([
                'judul' => $request->judul,
                'subjudul' => $request->subjudul,
                'foto' => $path_gambar,
            ]);

            return redirect()->route('event.index')->with('success', 'Event berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('admin.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        try {
            $oldPhotoPath = $event->foto;

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

            if (isset($dataToUpdate['foto']) && $oldPhotoPath) {
                Storage::disk('public')->delete($oldPhotoPath);
                $localFilePath = public_path('storage/' . $oldPhotoPath);
                if (File::exists($localFilePath)) {
                    File::delete($localFilePath);
                }
            }

            return redirect()->route('event.index')->with('success', 'Event berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        try {
            if (Storage::disk('public')->exists($event->foto)) {
                Storage::disk('public')->delete($event->foto);
            }

            $event->delete();

            return redirect()->route('event.index')->with('success', 'Event berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }
}
