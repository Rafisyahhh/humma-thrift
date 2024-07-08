<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdatePasswordRequest;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Flasher\Toastr\Prime\ToastrInterface;

class UserUpdatePasswordController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $countFavorite = Favorite::where('user_id', auth()->id())->count();

        return view('user.update-password', 'countFavorite');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdatePasswordRequest $request, $id) {
        $validatedRequest = $request->validated();
        $user = User::findOrFail($id);

        $user->update([
            'password' => Hash::make($validatedRequest['password'])
        ]);

        return redirect()->back()->with('success', 'sukses mengganti password');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
