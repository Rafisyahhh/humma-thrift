<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\StoreProfileController;

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
Route::view('/', 'landing.home');

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
    Route::view('/about', 'user.tentang')->name('about');
    Route::view('/brand', 'user.merek')->name('brand');
    Route::view('/detail', 'user.detail')->name('detail');
    Route::view('/profile', 'user.profil')->name('profile');
    Route::view('/order', 'user.order')->name('order');
    Route::view('/keranjang', 'user.keranjang')->name('cart');
    Route::view('/wishlist', 'user.wishlist')->name('wishlist');
    Route::view('/shop', 'user.shop')->name('shop');
    Route::view('/store', 'user.store')->name('store');
    Route::view('/history', 'user.history')->name('history');
    Route::view('/updatePassword', 'user.updatepassword')->name('updatePassword');

    Route::get('/open-shop', [\App\Http\Controllers\OpenShopController::class, 'index'])->name('register-seller');
    Route::post('/open-shop', [\App\Http\Controllers\OpenShopController::class, 'register'])->name('register-seller');
    Route::get('/verify-store/{token:verification_code}', [\App\Http\Controllers\OpenShopController::class, 'verifyStore'])->name('verify.store');
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
Route::view('/about-us', 'landing.about');
Route::view('/detail-about', 'landing.detailContactus');
Route::view('/detail-new', 'landing.detailNews');

# Home Redirect
Route::get('/home', \App\Http\Controllers\RedirectUserController::class)->name('home');

# Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::view('/', 'admin.index')->name('index');
    Route::resource('brand', BrandController::class);
    Route::resource('category', ProductCategoryController::class);
    Route::resource('user', UserController::class);
});

Route::prefix('@{store:username}')->group(function () {
    Route::get('/', [StoreProfileController::class, 'index'])->name('store.profile');
    Route::get('/products', [StoreProfileController::class, 'products'])->name('store.products');
});

