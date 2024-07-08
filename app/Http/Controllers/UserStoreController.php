<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserStore;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUserStoreRequest;
use App\Http\Requests\UpdateUserStoreRequest;

class UserStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $store = UserStore::all();
            $address = UserAddress::all();
            $user = User::all();
        } else {
            return redirect()->route('login')->with('error', 'Anda harus masuk untuk melihat informasi toko.');
        }
        return view('seller.index', compact('store', 'address', 'user'));
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
    public function update(UpdateUserStoreRequest $request, UserStore $id)
    {
        $data = collect($request->validated());

        // Proses unggah file avatar jika ada
        if ($request->hasFile('store_logo')) {
            // Hapus avatar lama jika ada
            if (Storage::disk('public')->exists($id->store_logo)) {
                Storage::disk('public')->delete($id->store_logo);
            }

            // Simpan avatar baru
            $data['store_logo'] = $request->file('store_logo')->store('store_logo', 'public');
        }

        if ($request->hasFile('store_cover')) {
            // Hapus avatar lama jika ada
            if ($id->store_cover !== null && Storage::disk('public')->exists($id->store_cover)) {
                Storage::disk('public')->delete($id->store_cover);
            }

            // Simpan cover baru
            $data['store_cover'] = $request->file('store_cover')->store('store_cover', 'public');
        }

        $id->update($data->except('phone')->toArray());

        # Update data user phone
        $user = $id->user;
        $user->update($data->only('phone')->toArray());

        // Redirect ke halaman profil
        return redirect()->route('seller.profile')->with("success", "Berhasil memperbaharui identitas dan profil lapak");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserStore $userStore)
    {
        //
    }
}
