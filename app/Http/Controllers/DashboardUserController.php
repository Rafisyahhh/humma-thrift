<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\cart;
use App\Models\Event;
use App\Models\Favorite;
use App\Models\ProductCategory;
use App\Models\TransactionOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class DashboardUserController
 *
 * Controller for handling user dashboard related actions.
 *
 * @package App\Http\Controllers
 */
class DashboardUserController extends Controller
{
    /**
     * Display the user dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $carts = cart::where('user_id', auth()->id())
        ->whereNotNull('product_id')
        ->orderBy('created_at')
        ->get();
        $countcart = cart::where('user_id', auth()->id())->count();
        $favorites = Favorite::where('user_id', auth()->id())
        ->whereNotNull('product_id')
        ->orderBy('created_at')
        ->get();
        $transaction = Order::latest()->get();
        $countFavorite = Favorite::where('user_id', auth()->id())->count();

        $transactionsbulan = TransactionOrder::select(DB::raw("MONTH(paid_at) as month"), DB::raw("SUM(total) as total"))
        ->whereYear('paid_at', date('Y'))
        ->where('user_id', Auth::id())
        ->groupBy(DB::raw("MONTH(paid_at)"))
        ->orderBy(DB::raw("MONTH(paid_at)"))
        ->get();

        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        $datas = array_fill(0, 12, 0); // Initialize data array with zeroes
        foreach ($transactionsbulan as $transaction) {
            $datas[$transaction->month - 1] = $transaction->total;
        }
        $countUnpaid = TransactionOrder::where('status','UNPAID')->count();
        $countDelivery = TransactionOrder::where('delivery_status','selesai')->count();
        return view('user.user', compact(
            'carts',
            'countcart',
            'favorites',
            'transaction',
            'countFavorite',
            'transactionsbulan',
            'months',
            'datas',
            'countUnpaid',
            'countDelivery',
        ));

    }
}
