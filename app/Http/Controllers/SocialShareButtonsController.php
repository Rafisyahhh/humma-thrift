<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jorenvh\Share\ShareFacade as Share; // Gunakan full namespace

class SocialShareButtonsController extends Controller
{
    public function show()
    {
        // Membuat komponen share
        try {
            // URL yang akan dibagikan
        $url = 'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/';
        $text = 'Your share text comes here';

        return view('user.detailproduct', compact('url', 'text'));
        } catch (\Exception $e) {
            dd($e->getMessage()); // Debugging pesan error
        }
    }
}
