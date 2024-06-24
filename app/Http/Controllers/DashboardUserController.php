<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Event;
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
        return view('user.user');
    }
}
