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
use App\Notifications\KalahLelang;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuctionsController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $auctions = auctions::all();
        $user = Auth::user();
        $notifications = auth()->user()->notifications;
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        return view('Landing.produk-auction', compact('auctions', 'user', 'notifications', 'countFavorite'));
    }
    public function notify() {
        $auctions = auctions::all();
        $user = Auth::user();
        $notifications = auth()->user()->notifications;
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        return view('user.notification', compact('auctions', 'user', 'notifications', 'countFavorite'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        // $product = ProductAuction::findOrFail($id);
        $auctions = auctions::all();
        $user = Auth::user();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        return view('Landing.produk-auction', compact('auctions', 'user', 'countFavorite'));
    }

    public function notifyuser() {
        $notifications = Auth::user()->notifications()->orderBy('read_at', 'asc')->orderBy('created_at', 'desc')->whereNull('read_at')->take(10)->get();
        $countcart = cart::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();


        return view('user.notification.notify-lelang', compact('notifications', 'countcart', 'carts', 'countFavorite'));
    }

    public function notifyshow(string $notificationId) {
        $notification = Auth::user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();

        $notifications = Auth::user()->notifications()->orderBy('read_at', 'asc')->orderBy('created_at', 'desc')->whereNull('read_at')->take(10)->get();
        $countcart = cart::where('user_id', auth()->id())->count();
        $carts = cart::where('user_id', auth()->id())
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();

        session()->flash('success', 'Notification read successfully');

        return view('user.notification.notify-lelang', compact('notifications','countcart','carts','countFavorite','notification'));
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
    public function readAll() {
        Auth::user()->getAttribute('unreadNotifications')->markAsRead();
        return redirect()->route('user.notification.index')->with('success', 'Sukses tandai baca');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        try {
            $product = ProductAuction::findOrFail($request->product_id);
            $user = Auth::user();

            # Cek dan validasikan kalau nominalnya gak sesuai rentang harga lelang
            $auctionPrice = $request->auction_price;
            $bidPriceStart = $product->bid_price_start;
            $bidPriceEnd = $product->bid_price_end;
            $errorMessage = 'Harga yang kamu tawarkan lebih atau kurang dari harga lelang yang ditetapkan!';

            if ($auctionPrice <= $bidPriceStart || $auctionPrice >= $bidPriceEnd) {
                return redirect()->back()->with('error', $errorMessage)->withErrors([
                    'auction_price' => $errorMessage
                ])->withInput();
            }

            # Buat record baru di tabel Auctions
            $auctions = Auctions::create([
                'user_id' => $user->id,
                'product_auction_id' => $product->id,
                'auction_price' => $auctionPrice,
                'status' => false,
                'delivery_status' => 'selesaikan pesanan',
            ]);

            # Ambil data user store
            $userStore = $product->userStore;

            if ($userStore) {
                flash()->info('Notification sent to UserStore: ' . $userStore->id);
                $userStore->user->notify(new SellerLelang($auctions));
                Log::info('Notification sent to UserStore: ' . $userStore->id);
            } else {
                flash()->error('UserStore not found for product: ' . $product->id);
                Log::error('UserStore not found for product: ' . $product->id);
                return redirect()->back()->with('success', 'Lelang berhasil ditambahkan tetapi notifikasi gagal dikirim: UserStore not found');
            }

            return redirect()->back()->with('success', 'Lelang berhasil ditambahkan');
        } catch (\Throwable $th) {
            Log::error('Error in store method: ' . $th->getMessage(), $th->getTrace());
            return redirect()->back()->withInput()->withErrors(['error' => $th->getMessage()]);
        } catch (\Exception $e) {
            Log::error('Error in store method: ' . $e->getMessage(), $e->getTrace());
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // In AuctionsController.php
    public function testNotification() {
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
    public function showSeller(auctions $auctions) {
        $auctions = Auctions::orderBy('created_at', 'asc')->orderBy('auction_price', 'desc')->get();
        $user = Auth::user();

        return view('seller.produk', compact('auctions', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editlelang(auctions $auctions) {
        $auctions = Auctions::orderBy('created_at', 'asc')->orderBy('auction_price', 'desc')->get();
        $productAuction = ProductAuction::find($auctions->product_auction_id);
        $user = Auth::user();

        return view('seller.produk', compact('auctions', 'user', 'productAuction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatelelang(UpdateauctionsRequest $request, auctions $auctions) {
        try {
            // $auctions2 = $auctions->productAuction->auctions;
            // foreach ($auctions2 as $item) {
            //     if ($item->user_id != $auctions->user_id) {
            //         $item->user->notify(new KalahLelang($auctions, $item->user));
            //     }
            // }
            $dataToUpdate = [
                'status' => $request->status == 1,
            ];

            $auctions->update($dataToUpdate);

            if ($auctions->status) {
                $auctions->user->notify(new Lelang($auctions));
            }

            $productAuction = ProductAuction::find($auctions->product_auction_id);

            if ($productAuction) {
                $productAuction->price = $auctions->auction_price; // Update the auction_price field in the product_auction table
                $productAuction->save();
            } else {
                throw new \Exception('Product Auction not found');
            }

            return redirect()->route('seller.product.index')->with('success', 'Lelang berhasil dipilih');
        } catch (\Throwable $th) {
            Log::error('Error in updatelelang method: ' . $th->getMessage());
            return redirect()->route('seller.product.index')
                ->withInput()
                ->withErrors(['error' => 'Terjadi kesalahan: ' . $th->getMessage()]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(auctions $auctions) {
        //
    }
}
