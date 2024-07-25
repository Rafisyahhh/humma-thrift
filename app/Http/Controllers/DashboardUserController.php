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
        $countUnpaid = TransactionOrder::where('status','UNPAID')->count();
        $countDelivery = TransactionOrder::where('delivery_status','selesai')->count();
        return view('user.user', compact(
            'countcart',
            'carts',
            'favorites',
            'countFavorite',
            'countUnpaid',
            'countDelivery',
            'transaction'
        ));

    }
}
