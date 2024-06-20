<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Auth::user()->notifications()->paginate(10);
        return view('admin.notification.index', compact('notifications'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        $notification->markAsRead();

        $notifications = Auth::user()->notifications()->paginate(10);
        return view('admin.notification.show', compact('notifications', 'notification'));
    }

    /**
     * Read All Notification
     *
     * @return void
     */
    public function readAll()
    {
        Auth::user()->getAttribute('unreadNotifications')->markAsRead();
        return redirect()->route('admin.notification.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        try {
            $notification->delete();

            return redirect()->route('admin.notification.index')->with('success', 'Berhasil menghapus notifikasi');
        } catch (\Throwable $th) {
            return redirect()->route('admin.notification.index')->with('error', 'Gagal menghapus notifikasi');
        } catch (\Exception $e) {
            return redirect()->route('admin.notification.index')->with('error', 'Gagal menghapus notifikasi');
        }
    }
}
