<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, User $user)
    {
        $search = $request->input('search');
        $role = $request->input('role');

        $users = User::when($search, fn ($query) => $query->where('email', 'LIKE', "%$search%"))
            ->when($role === 'user', fn ($query) => $query->whereHas('roles', fn ($q) => $q->where('name', $role))->orderBy('created_at', 'asc'))
            ->when($role === 'seller', fn ($query) => $query->has('store'))
            ->paginate(10);

        return view('admin.user', compact('users'));
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
     * Method show
     *
     * @return View
     */
    public function show(): View
    {
        return view('user.profil');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * update user
     *
     * @param UpdateUserRequest $request [explicite description]
     * @param string $id [explicite description]
     *
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, string $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $avatarPath = auth()->user()->avatar;
        // Proses unggah file avatar jika ada
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar) Storage::disk('public')->delete($user->avatar);

            // Simpan avatar baru
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }
        $user->update([
            'username' => $request->username,
            'name' => $request->name,
            'phone' => $request->phone,
            'avatar' => $avatarPath,
            'pbirth' => $request->pbirth,
            'dbirth' => $request->dbirth,
        ]);
        return redirect()->back()->with("success", "Berhasil Memperbarui Profil");
    }

    /**
     * Method Hapus
     *
     * @param User $user [explicite description]
     *
     * @return RedirectResponse
     */
    public function destroy(User $user):RedirectResponse
    {

        if (Storage::disk('public')->exists($user->nic_photo)) Storage::disk('public')->delete($user->nic_photo);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Pengguna berhasil di hapus');
    }
}
