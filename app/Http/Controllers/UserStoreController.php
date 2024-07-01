<?php

namespace App\Http\Controllers;

use App\Models\UserStore;
use App\Http\Requests\StoreUserStoreRequest;
use App\Http\Requests\UpdateUserStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserStore $userStore)
    {
        $store = UserStore::where('user_id', auth()->user()->id)->first();
        return view('seller.profil', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserStore $userStore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserStoreRequest $request, $id)
    {
        $store = UserStore::findOrFail($id);
        // Inisialisasi variabel logoPath dan coverPath dengan nilai default null
        $logoPath = $store->store_logo;
        $coverPath = $store->store_cover;
        // Proses unggah file avatar jika ada
        if ($request->hasFile('store_logo')) {
            // Hapus avatar lama jika ada
            if ($store->store_logo) {
                Storage::disk('public')->delete($store->store_logo);
            }
            // Simpan avatar baru
            $logoPath = $request->file('store_logo')->store('store_logo', 'public');
            $store->store_logo = $logoPath;
        }
        if ($request->hasFile('store_cover')) {
            // Hapus avatar lama jika ada
            if ($store->store_cover) {
                Storage::disk('public')->delete($store->store_cover);
            }
            // Simpan avatar baru
            $coverPath = $request->file('store_cover')->store('store_cover', 'public');
            $store->store_cover = $coverPath;
        }
        $store->update([
            'name' => $request->name,
            'address' => $request->address,
            'description' => $request->description,
            'store_logo' => $logoPath,
            'store_cover' => $coverPath,
        ]);
        $user = $store->user;
        $user->update([
            'phone' => $request->phone,
        ]);
        return redirect()->route('seller.profile')->with("success", "Berhasil Memperbarui Profil Lapak");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserStore $userStore)
    {
        //
    }
}
