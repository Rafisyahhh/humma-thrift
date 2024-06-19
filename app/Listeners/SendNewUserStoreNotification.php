<?php

namespace App\Listeners;

use App\Events\NewUserStoreCreated;
use App\Mail\NewUserStoreNotificationToAdmin;
use App\Mail\VerifyUserStoreNotification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;
use Mail;

class SendNewUserStoreNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewUserStoreCreated $event): void
    {
        // Mengambil semua pengguna dengan peran 'admin'
        $admins = User::role('admin')->get();

        // Kirim email notifikasi ke admin
        foreach ($admins as $admin) {
            try {
                Mail::to($admin->email)->send(new NewUserStoreNotificationToAdmin($event->userStore));
                Log::info("Email sent to admin: {$admin->email}");
            } catch (\Exception $e) {
                Log::error("Failed to send email to admin {$admin->email}: " . $e->getMessage());
            }
        }

        // Kirim email verifikasi ke user
        try {
            $user = User::find($event->userStore->user_id);
            Mail::to($user->email)->send(new VerifyUserStoreNotification($event->userStore));
            Log::info("Email sent to user: {$user->email}");
        } catch (\Exception $e) {
            Log::error("Failed to send email to user {$user->email}: " . $e->getMessage());
        }
    }
}
