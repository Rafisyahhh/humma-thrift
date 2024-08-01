<?php

use App\Http\Controllers\HeaderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    StoreProfileController,
};
use App\Http\Controllers\Payment\CallbackController;

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


# User Routes
include __DIR__ . '\role\user.php';

# Seller Routes
include __DIR__ . '\role\seller.php';

# Admin Routes
include __DIR__ . '\role\admin.php';

# Landing Pages
include __DIR__ . '\landing.php';


# Authentication Routes
Auth::routes(['verify' => true]);

# Debug Routes
Route::prefix('/debug')->middleware(\App\Http\Middleware\DevelopmentMiddleware::class)->group(function () {
    //
});

# Dev Routes
Route::prefix('dev')->group(function () {
    Route::view('admin-view', 'admin.index');
});


# Store Profile Routes
Route::prefix('@{store:username}')->controller(StoreProfileController::class)->group(function () {
    Route::get('/', 'index')->name('store.profile');
    Route::get('products', 'products')->name('store.products');
    Route::get('{product:slug}', 'productDetail')->name('store.product.detail');
});

# Callback
Route::post('callback', [CallbackController::class, 'handle'])->name('callback');

Route::prefix('header')->name('header.')->group(function () {
    Route::get('cart', [HeaderController::class, 'cart'])->name('cart');
    Route::get('notification', [HeaderController::class, 'notification'])->name('notification');
    Route::get('wishlist', [HeaderController::class, 'wishlist'])->name('wishlist');
});