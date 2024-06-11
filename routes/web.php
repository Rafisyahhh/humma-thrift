<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('layouts.app');
});

Route::get('/penjual', function () {
    return view('penjualan.penjualan');
});

Route::get('/home', function () {
    return view('user.home');
});

Route::get('/profil', function () {
    return view('user.profil');
});

Route::get('/shop', function () {
    return view('user.shop');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
