<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\UserUpdatePasswordController;

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
Route::prefix('/debug')->group(function () {
    Route::view('home', 'debug.home');
    Route::view('modal', 'debug.modal');
});

# Public Routes
Route::get('/', [LandingpageController::class, 'index']);

# Seller Routes
Route::prefix('seller')->middleware('auth')->name('seller.')->group(function () {
    Route::view('/home', 'seller.index')->name('home');
    Route::view('/transaction', 'seller.transaksi')->name('transaction');
    Route::view('/income', 'seller.penghasilan')->name('income');
    Route::view('/product', 'seller.produk')->name('product');
    Route::view('/profil', 'seller.profil')->name('profil');
    Route::view('/tambahproduk', 'seller.tambahproduk')->name('tambahproduk');
});

# User Routes
Route::prefix('user')->middleware(['auth', 'role:user'])->name('user.')->group(function () {
    Route::view('/userhome', 'user.user')->name('userhome');
    Route::view('/detailproduct', 'user.detailproduct')->name('detailproduct');
    Route::view('/checkout', 'user.checkout')->name('checkout');
    Route::view('/open-shop', 'user.registstore')->name('registstore');
    Route::get('/about', [AboutUsController::class, 'user'])->name('about');
    Route::view('/brand', 'user.merek')->name('brand');
    Route::view('/detail', 'user.detail')->name('detail');
    Route::view('/profile', 'user.profil')->name('profile');
    Route::view('/order', 'user.order')->name('order');
    Route::view('/keranjang', 'user.keranjang')->name('cart');
    Route::view('/wishlist', 'user.wishlist')->name('wishlist');
    Route::view('/shop', 'user.shop')->name('shop');
    Route::view('/store', 'user.store')->name('store');
    Route::resource('history', UserUpdatePasswordController::class);
    Route::resource('update-password', UserUpdatePasswordController::class);
});

# Dev Routes
Route::prefix('dev')->group(function () {
    Route::view('/admin-view', 'admin.index');
});

# Landing Pages
Route::view('/produk', 'landing.produk');
Route::view('/brandindex', 'landing.brand');
Route::view('/toko', 'landing.toko');
Route::view('/detail', 'landing.detail');
Route::get('/about-us', [AboutUsController::class, 'landingpage']);
Route::view('/detail-about', 'landing.detailContactus');
Route::view('/detail-new', 'landing.detailNews');

# Home Redirect
Route::get('/home', \App\Http\Controllers\RedirectUserController::class)->name('home');

# Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::view('/', 'admin.index')->name('index');
    Route::resource('about', AboutUsController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('category', ProductCategoryController::class);
    Route::resource('user', UserController::class);
    Route::resource('event', EventController::class);
});