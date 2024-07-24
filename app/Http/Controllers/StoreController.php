<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserStore;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $store = UserStore::whereHas('user', function ($query) {
            $query->where('banned', false);
        })->get();
        return view('admin.store');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $store = UserStore::findOrFail($id);

        $store->user()->update([
            'banned' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, UserStore $store)
    {
        //
    }
}
