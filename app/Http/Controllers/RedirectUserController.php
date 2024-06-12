<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if(auth()->user()->getUserRoleInstance()->value === 'admin') {
            return redirect()->route('admin.index');
        }

        return redirect()->url('/dasbor');
    }
}
