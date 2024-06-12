<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
Route::get('/detailproduct', function () {
    return view('user.detailproduct');
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


Route::prefix('/dev')->group(function() {
    Route::get('/admin-view', function() {
        return view('admin.index');
    });
});

Route::get('/landing', function () {
    return view('Landing.landing');
});

Route::get('/produk', function () {
    return view('Landing.produk');
});

Route::get('/brandindex', function () {
    return view('Landing.brand');
});

Route::get('/toko', function () {
    return view('Landing.toko');
});

Route::get('/detail', function () {
    return view('Landing.detail');
});

Route::get('/about', function () {
    return view('Landing.about');
});

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::delete('/userDestroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');

Route::resource('brand', BrandController::class);
Route::resource('category', ProductCategoryController::class);
