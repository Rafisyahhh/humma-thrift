<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserUpdatePasswordController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
        return view('user.update-password');
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

        if (!password_verify($validatedRequest['old-password'], $user->password)) {
            return redirect()->back()->with('message', 'wrong password');
        }

        if (password_verify($validatedRequest['password'], $user->password)) {
            return redirect()->back()->with('message', 'password cant same with old password');
        }

        $user->update([
            'password' => Hash::make($validatedRequest['password'])
        ]);

        return redirect()->back()->with('message', 'password changed');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}