<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class AdminWithdrawController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
        $users = User::where("role");
        foreach ($users as $user) {
            // $user->notify(new WithdrawalNotification($data));
            dd($user->getUserRoleInstance());
        }
        return view('admin.withdraw');
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
    public function update(Request $request, string $id) {
        $request->validate([
            'status' => 'required|in:failed,processed,complete',
        ], [
            'status.required' => 'Kolom STATUS wajib diisi.',
        ]);

        $withdraw = Withdrawal::find($id);

        if ($withdraw) {
            $withdraw->status = $request->status;
            $withdraw->save();
            return redirect()->back()->with('success', 'Status penarikan berhasil diperbarui.');
        }


        return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}