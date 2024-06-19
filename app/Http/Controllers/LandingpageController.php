<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;


class LandingpageController extends Controller
{
    public function index() {
        $event =  Event::all();
        return view('landing.home', compact('event'));
    }

}
