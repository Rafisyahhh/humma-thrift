<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductCategoryController;

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
Route::get('/seller', function () {
    return view('penjualan.penjualan');
});

Route::get('/user', function () {
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
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');

Route::resource('brand', BrandController::class);
Route::resource('category', ProductCategoryController::class);
