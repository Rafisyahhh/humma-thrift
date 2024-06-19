<?php

namespace App\Http\Controllers;
use App\Models\event;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function dashboard() {
        $event = Event::all();
        return view('user.user',compact('event'));
    }
}
