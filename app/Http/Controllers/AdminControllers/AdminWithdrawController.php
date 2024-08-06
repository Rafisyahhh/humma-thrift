<?php

namespace App\Http\Controllers\AdminControllers;

use App\Enums\WithdrawalStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\CustomMessageNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminWithdrawController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
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
    public function update(Request $request, $id) {
        $request->validate([
            'status' => 'required_without_all:image,message|in:failed,processed,complete',
        ], [
            'status.required' => 'Kolom STATUS wajib diisi.',
        ]);

        $withdraw = Withdrawal::with(["user", "bank"])->find($id);

        if ($withdraw) {
            if ($request->filled("status")) {
                $withdraw->status = $request->status;
                $withdraw->save();
            }
            if ($request->hasFile("image")) {
                $request->validate([
                    'image' => 'required',
                ], [
                    'image.required' => 'Kolom Bukti wajib diisi.',
                ]);
                $data = [];
                if ($request->hasFile('image')) {
                    $data['image'] = $request->file('image')->store('image', 'public');
                }
                $withdraw->update([
                    "status" => WithdrawalStatusEnum::COMPLETED->value
                ]);

                // Debugging
                $notificationData = [
                    "title" => "Penarikan anda diterima",
                    "image" => $data['image'],
                    "message" => "Halo {$withdraw->user->name}, Penarikan anda dengan jumlah $withdraw->amount telah dikirim ke Bank {$withdraw->bank->name} dengan No. Rekening $withdraw->bank_number",
                    "action" => route('seller.withdraw.index')
                ];

                $notificationOptions = [
                    "subject" => "Penarikan anda diterima",
                    "greeting" => "Halo {$withdraw->user->name}, Penarikan anda dengan jumlah $withdraw->amount telah dikirim ke Bank {$withdraw->bank->name} dengan No. Rekening $withdraw->bank_number",
                    "action" => ['Lihat Detail', url('/seller/withdraw')],
                    "line" => "Terima penarikan!."
                ];

                $withdraw->user->notify(new CustomMessageNotification($notificationData, $notificationOptions));
            } elseif ($request->filled("message")) {
                $request->validate([
                    'message' => 'required',
                ], [
                    'message.required' => 'Kolom Bukti wajib diisi.',
                ]);

                $withdraw->update([
                    "status" => WithdrawalStatusEnum::FAILED->value
                ]);
                $user = User::find($withdraw->user_id);
                $user->notify(new CustomMessageNotification([
                    "title" => "Terjadi kesalahan dengan penarikan anda",
                    "message" => $request->input('message'),
                    "action" => route('seller.withdraw.index')
                ], [
                    "subject" => "Terjadi kesalahan dengan penarikan anda",
                    "greeting" => $request->input('message'),
                    "line" => "Tarik ulang?."
                ]));
            }
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