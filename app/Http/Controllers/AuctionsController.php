<?php

namespace App\Http\Controllers;

use App\Models\auctions;
use App\Http\Requests\StoreauctionsRequest;
use App\Http\Requests\UpdateauctionsRequest;
use App\Models\cart;
use App\Models\Favorite;
use App\Models\Notification;
use App\Models\ProductAuction;
use App\Models\ProductCategory;
use App\Notifications\Lelang;
use App\Notifications\SellerLelang;
use Auth;
use Illuminate\Support\Facades\Log;


class AuctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auctions = auctions::all();
        $user = Auth::user();
        $notifications = auth()->user()->notifications;
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        return view('Landing.produk-auction', compact('auctions', 'user', 'notifications', 'countFavorite'));
    }
    public function notify()
    {
        $auctions = auctions::all();
        $user = Auth::user();
        $notifications = auth()->user()->notifications;
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        return view('user.notification', compact('auctions', 'user', 'notifications', 'countFavorite'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $product = ProductAuction::findOrFail($id);
        $auctions = auctions::all();
        $user = Auth::user();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        return view('Landing.produk-auction', compact('auctions', 'user', 'countFavorite'));
    }

    public function notifyuser()
    {
        $notifications = Auth::user()->notifications()->paginate(20);
        $countcart = cart::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
        ->whereNotNull('product_id')
        ->orderBy('created_at')
        ->get();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();

        return view('user.notification.notify-lelang', compact('notifications','countcart','carts','countFavorite'));

    }

    public function notifyshow(string $notificationId)
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


        return view('user.notification.show-lelang', compact('notifications','countcart','carts','countFavorite','notification'));
    }

    public function destroynotify($id) {
        try {
            $notification = Auth::user()->notifications()->findOrFail($id);
            $notification->delete();
            return redirect()->route('user.notification.index')->with('success', 'Berhasil menghapus notifikasi');
        } catch (\Throwable $th) {
            return redirect()->route('user.notification.index')->with('error', 'Gagal menghapus notifikasi');
        } catch (\Exception $e) {
            return redirect()->route('user.notification.index')->with('error', 'Gagal menghapus notifikasi');
        }
    }
    public function readAll()
    {
        Auth::user()->getAttribute('unreadNotifications')->markAsRead();
        return redirect()->route('user.notification.index');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreauctionsRequest $request)
    {
        try {
            $product = ProductAuction::findOrFail($request->product_id);
            $user = Auth::user();

            $auctions = Auctions::create([
                'user_id' => $user->id,
                'product_auction_id' => $product->id,
                'auction_price' => $request->auction_price,
                'status' => false,
                'delivery_status' => 'selesaikan pesanan',
            ]);
            // Fetch the user store
            $userStore = $product->userStore;

            if ($userStore) {
                // Ini yang aku tambahin
                $userStore->user->notify(new SellerLelang($auctions));
                Log::info('Notification sent to UserStore: ' . $userStore->id);
            } else {
                Log::error('UserStore not found for product: ' . $product->id);
                return redirect()->back()->with('success', 'Lelang berhasil ditambahkan tetapi notifikasi gagal dikirim: UserStore not found');
            }

            return redirect()->back()->with('success', 'Lelang berhasil ditambahkan');
        } catch (\Throwable $th) {
            Log::error('Error in store method: ' . $th->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }


    // In AuctionsController.php
    public function testNotification()
    {
        try {
            $auction = Auctions::first(); // Assuming you have some auction data
            $productAuction = $auction->productAuction;
            $userStore = $productAuction->userStore;

            if ($userStore) {
                $userStore->notify(new SellerLelang($auction));
                return 'Notification sent!';
            } else {
                return 'Failed to send notification: UserStore not found';
            }
        } catch (\Throwable $th) {
            return 'Failed to send notification: ' . $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function showSeller(auctions $auctions)
    {
        $auctions = Auctions::orderBy('created_at', 'asc')->orderBy('auction_price', 'desc')->get();
        $user = Auth::user();

        return view('seller.produk', compact('auctions', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editlelang(auctions $auctions)
    {
        $auctions = Auctions::orderBy('created_at', 'asc')->orderBy('auction_price', 'desc')->get();
        $user = Auth::user();

        return view('seller.produk', compact('auctions', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatelelang(UpdateauctionsRequest $request, auctions $auctions)
    {
        try {

            $dataToUpdate = [
                'status' => $request->input('status') == 1,
            ];

            $auctions->update($dataToUpdate);

            // Kirim notifikasi jika status berhasil diperbarui
            if ($auctions->status) {
                $auctions->user->notify(new Lelang($auctions));
            }
            return redirect()->route('seller.product.index')->with('success', 'lelang berhasil di pilih');
        } catch (\Throwable $th) {
            return redirect()->route('seller.product.index')->withInput()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(auctions $auctions)
    {
        //
    }
}
