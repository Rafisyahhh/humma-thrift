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
    return view('landing.landing');
});
Route::get('/admin', function () {
    return view('layouts.app');
});

Route::get('/seller/home', function () {
    return view('penjualan.index');
})->name('seller.home');

Route::get('/seller/transaction', function () {
    return view('penjualan.transaksi');
})->name('seller.transaction');

Route::get('/seller/income', function () {
    return view('penjualan.penghasilan');
})->name('seller.income');

Route::get('/seller/product', function () {
    return view('penjualan.produk');
})->name('seller.product');

Route::get('/seller/profil', function () {
    return view('penjualan.profil');
})->name('seller.profil');

Route::get('/seller/tambahproduk', function () {
    return view('penjualan.tambahproduk');
});


//USER
Route::get('/user/home', function () {
    return view('user.user');
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

Auth::routes([
    'verify' => true,
]);
Route::get('/user/about', function () {
    return view('user.tentang');
});

Route::get('/user/brand', function () {
    return view('user.merek');
});

Route::get('/store', function () {
    return view('user.store');
});

Route::get('/user/detail', function () {
    return view('user.detail');
});


Auth::routes();

Route::get('/home', \App\Http\Controllers\RedirectUserController::class)->name('home');

Route::prefix('/dev')->group(function() {
    Route::get('/admin-view', function() {
        return view('admin.index');
    });
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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => view('admin.index'))->name('index');
    Route::resource('brand', BrandController::class);
    Route::resource('category', ProductCategoryController::class);
    Route::resource('user', UserController::class);
});
