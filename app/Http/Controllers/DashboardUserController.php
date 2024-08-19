<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\cart;
use App\Models\Event;
use App\Models\Favorite;
use App\Models\ProductCategory;
use App\Models\TransactionOrder;
use App\Models\Order;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class DashboardUserController
 *
 * Controller for handling user dashboard related actions.
 *
 * @package App\Http\Controllers
 */
class DashboardUserController extends Controller {
    private TransactionOrder $_transactions;
    private Withdrawal $_withdrawal;

    public function __construct(TransactionOrder $transactions, Withdrawal $withdrawal) {
        $this->_transactions = $transactions;
        $this->_withdrawal = $withdrawal;
    }
    /**
     * Display the user dashboard.
     *
     * @return \Illuminate\View\View
     */
    // public function dashboard() {
    //     $carts = cart::where('user_id', auth()->id())
    //         ->whereNotNull('product_id')
    //         ->orderBy('created_at')
    //         ->get();
    //     $countcart = cart::where('user_id', auth()->id())->count();
    //     $favorites = Favorite::where('user_id', auth()->id())
    //         ->whereNotNull('product_id')
    //         ->orderBy('created_at')
    //         ->get();
    //     $order = Order::latest()->get();
    //     $countFavorite = Favorite::where('user_id', auth()->id())->count();
    //     $currentDate = now();

    //     $countUnpaid = TransactionOrder::where('user_id', auth()->user()->id)->where('status', 'UNPAID')->count();
    //     $countDelivery = TransactionOrder::where('user_id', auth()->user()->id)->where('delivery_status', 'selesai')->count();


    //     $userId = auth()->id();
    //     $currentDate = now();

    //     // Fetch carts and favorites for the authenticated user
    //     $carts = Cart::where('user_id', $userId)
    //         ->whereNotNull('product_id')
    //         ->orderBy('created_at')
    //         ->get();
    //     $countcart = $carts->count();

    //     $favorites = Favorite::where('user_id', $userId)
    //         ->whereNotNull('product_id')
    //         ->orderBy('created_at')
    //         ->get();
    //     $countFavorite = $favorites->count();


    //     // Count unpaid and delivered transactions for the user
    //     $countUnpaid = TransactionOrder::where('user_id', $userId)
    //         ->where('status', 'UNPAID')
    //         ->count();
    //     $countDelivery = TransactionOrder::where('user_id', $userId)
    //         ->where('delivery_status', 'selesai')
    //         ->count();

    //     // Monthly sales data
    //     // $months = collect(range(1, 12))->map(function ($month) use ($currentDate) {
    //     //     return $currentDate->format('Y-') . str_pad($month, 2, '0', STR_PAD_LEFT);
    //     // })->toArray();

    //     $months = collect(range(1, 12))->map(function ($month) use ($currentDate) {
    //         return $currentDate->month($month)->format('F');
    //     })->toArray();

    //     $driver = \DB::getDriverName();

    //     $monthlyGrossQuery = TransactionOrder::where('user_id', $userId)
    //         ->where('status', 'PAID')
    //         ->whereYear('created_at', $currentDate->year);

    //     if ($driver === 'sqlite') {
    //         $monthlyGrossQuery->selectRaw('strftime("%m", created_at) as month, SUM(total_harga) as total')
    //             ->groupBy(\DB::raw('strftime("%m", created_at)'));
    //     } elseif ($driver === 'mysql') {
    //         $monthlyGrossQuery->selectRaw('MONTH(created_at) as month, SUM(total_harga) as total')
    //             ->groupBy(\DB::raw('MONTH(created_at)'));
    //     }

    //     $monthlyGross = $monthlyGrossQuery->get()->keyBy('month');

    //     $monthlyGrossData = collect(range(1, 12))->map(function ($month) use ($monthlyGross) {
    //         return $monthlyGross->get($month)->total ?? 0;
    //     })->toArray();

    //     return view('user.user', compact(
    //         'carts',
    //         'countcart',
    //         'favorites',
    //         'order',
    //         'countFavorite',
    //         'countUnpaid',
    //         'countDelivery',
    //         'months',
    //         'monthlyGrossData'
    //     ));
    // }
    public function dashboard() {
        $userId = auth()->id();
        $currentDate = now();

        // Fetch carts and favorites for the authenticated user
        $carts = Cart::where('user_id', $userId)
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();
        $countcart = $carts->count();

        $favorites = Favorite::where('user_id', $userId)
            ->whereNotNull('product_id')
            ->orderBy('created_at')
            ->get();
        $order = Order::latest()->get();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        $currentDate = now();
        $countFavorite = $favorites->count();

        // Count unpaid and delivered transactions for the user
        $countUnpaid = TransactionOrder::where('user_id', $userId)
            ->where('status', 'UNPAID')
            ->count();
        $countDelivery = TransactionOrder::where('user_id', $userId)
            ->where('delivery_status', 'selesai')
            ->count();

        // Monthly sales data
        $months = collect(range(1, 12))->map(function ($month) use ($currentDate) {
            return Carbon::createFromDate($currentDate->year, $month, 1)->translatedFormat('F');
        })->toArray();

        $driver = \DB::getDriverName();

        $monthlyGrossQuery = TransactionOrder::where('user_id', $userId)
            ->where('status', 'PAID')
            ->whereYear('created_at', $currentDate->year);

        if ($driver === 'sqlite') {
            $monthlyGrossQuery->selectRaw('strftime("%m", created_at) as month, SUM(total_harga) as total')
                ->groupBy(\DB::raw('strftime("%m", created_at)'));
        } elseif ($driver === 'mysql') {
            $monthlyGrossQuery->selectRaw('MONTH(created_at) as month, SUM(total_harga) as total')
                ->groupBy(\DB::raw('MONTH(created_at)'));
        }

        $monthlyGross = $monthlyGrossQuery->get()->keyBy('month');

        $monthlyGrossData = collect(range(1, 12))->map(function ($month) use ($monthlyGross) {
            return $monthlyGross->get($month)->total ?? 0;
        })->toArray();

        return view('user.user', compact(
            'carts',
            'countcart',
            'favorites',
            'order',
            'countFavorite',
            'countUnpaid',
            'countDelivery',
            'months',
            'monthlyGrossData'
        ));
}
}
