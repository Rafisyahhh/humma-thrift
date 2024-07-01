<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class UserApiController extends Controller {
    //
    public function getUser(Request $request) {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)->make(true);
        }
    }
    public function storeUser(Request $request) {

    }
    public function updateUser(Request $request) {

    }
}