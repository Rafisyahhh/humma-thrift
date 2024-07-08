<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\cart;
use App\Models\Event;
use App\Models\Favorite;
use App\Models\ProductCategory;
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

        $countFavorite = Favorite::where('user_id', auth()->id())->count();
        return view('user.user', compact(
            'countcart',
            'carts',
            'favorites',
            'countFavorite'
        ));

    }
}
