<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectUserController extends Controller {
    /**
     * Constructor
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) {
        if (Auth::user()->getUserRoleInstance()->value === 'admin') {
            return redirect()->route('admin.index');
        }

        return redirect()->to('/');
    }
}