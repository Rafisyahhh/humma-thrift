<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Favorite;
use Auth;
use Illuminate\Http\Request;

class NotificationSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Auth::user()->notifications()->paginate(20);
        $countcart = cart::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
        ->whereNotNull('product_id')
        ->orderBy('created_at')
        ->get();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();

        return view('seller.notification.index', compact('notifications','countcart','carts','countFavorite'));
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
    public function show(string $notificationId)
    {
        $notification = Auth::user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();

        $notifications = Auth::user()->notifications()->paginate(20);
        $countcart = cart::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();

        return view('seller.notification.show', compact('notifications','countcart','carts','countFavorite','notification'));

    }

    public function readAll()
    {
        Auth::user()->getAttribute('unreadNotifications')->markAsRead();
        return redirect()->route('user.notification.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
