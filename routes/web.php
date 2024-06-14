<?php

use App\Http\Controllers\BrandController;
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

# Authentication Routes
Auth::routes(['verify' => true]);

# Debug Routes
Route::prefix('/debug')->group(function() {
    Route::get('home', fn() => view('debug.home'));
    Route::get('modal', fn() => view('debug.modal'));
});

# Public Routes
Route::view('/', 'landing.home');

# Seller Routes
Route::prefix('seller')->name('seller.')->group(function() {
    Route::view('/home', 'penjualan.index')->name('home');
    Route::view('/transaction', 'penjualan.transaksi')->name('transaction');
    Route::view('/income', 'penjualan.penghasilan')->name('income');
    Route::view('/product', 'penjualan.produk')->name('product');
    Route::view('/profil', 'penjualan.profil')->name('profil');
    Route::view('/tambahproduk', 'penjualan.tambahproduk')->name('tambahproduk');
});

# User Routes
Route::prefix('user')->middleware('role:user')->name('user.')->group(function() {
    Route::view('/home', 'user.user')->name('home');
    Route::view('/detailproduct', 'user.detailproduct')->name('detailproduct');
    Route::view('/checkout', 'user.checkout')->name('checkout');
    Route::view('/registstore', 'user.registstore')->name('registstore');
    Route::view('/about', 'user.tentang')->name('about');
    Route::view('/brand', 'user.merek')->name('brand');
    Route::view('/detail', 'user.detail')->name('detail');
    Route::view('/profile', 'user.profil')->name('profile');
    Route::view('/order', 'user.order')->name('order');
    Route::view('/keranjang', 'user.keranjang')->name('cart');
    Route::view('/wishlist', 'user.wishlist')->name('wishlist');
    Route::view('/shop', 'user.shop')->name('shop');
    Route::view('/store', 'user.store')->name('store');
});

# Dev Routes
Route::prefix('dev')->group(function() {
    Route::view('/admin-view', 'admin.index');
});

# Landing Pages
Route::view('/produk', 'Landing.produk');
Route::view('/brandindex', 'Landing.brand');
Route::view('/toko', 'Landing.toko');
Route::view('/detail', 'Landing.detail');
Route::view('/about', 'Landing.about');

# Home Redirect
Route::get('/home', \App\Http\Controllers\RedirectUserController::class)->name('home');

# Admin Routes
// Route::prefix('user')->middleware(['auth', 'role:user'])->name('user.')->group(function() {
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function() {
    Route::view('/', 'admin.index')->name('index');
    Route::resource('brand', BrandController::class);
    Route::resource('category', ProductCategoryController::class);
    Route::resource('user', UserController::class);
});
