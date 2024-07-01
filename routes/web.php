<?php

use App\Http\Controllers\ApiControllers\UserApiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AboutUsController,
    AuctionsController,
    UserController,
    BrandController,
    DashboardUserController,
    EventController,
    LandingpageController,
    NotificationController,
    ProductCategoryController,
    StoreProfileController,
    UserUpdatePasswordController,
    OpenShopController,
    ProductAuctionController,
    ProductController,
    RedirectUserController,
    DetailProductController,
    HistoryController,
    ProductAdminController,
    UserStoreController
};
use App\Models\User;
use App\Models\UserStore;
use App\Notifications\SellerWelcomeNotification;
use Illuminate\Support\Facades\Notification;

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
Route::prefix('/debug')->middleware(\App\Http\Middleware\DevelopmentMiddleware::class)->group(function () {
    // Route::view('home', 'debug.home');
    // Route::view('modal', 'debug.modal');

    Route::get('/test', function () {
        $user = fn() => "hello world";

        dd(gettype($user));
    });
});

# Public Routes
Route::get('/', [LandingpageController::class, 'index']);

# Seller Routes
Route::prefix('seller')->middleware(['auth', 'seller'])->name('seller.')->group(function () {
    Route::view('/home', 'seller.index')->name('home');
    Route::view('/transaction', 'seller.transaksi')->name('transaction');
    Route::view('/income', 'seller.penghasilan')->name('income');
    // Route::view('/product', 'seller.produk')->name('product');
    Route::get('profil', [UserStoreController::class, 'show'])->name('profile');
    Route::post('/profile/{id}', [UserStoreController::class, 'update'])->name('profile.update');
    Route::resource('product', ProductController::class);
    Route::resource('productauction', ProductAuctionController::class);
    Route::get('productauction/{id}', [AuctionsController::class, 'showSeller'])->name('productauction.showSeller');
});

# User Routes
Route::prefix('user')->middleware(['auth', 'role:user'])->name('user.')->group(function () {
    Route::get('/', [DashboardUserController::class, 'dashboard'])->name('userhome');
    Route::view('checkout', 'user.checkout')->name('checkout');
    Route::view('about', 'user.tentang')->name('about');
    Route::get('brand', [LandingpageController::class, 'brand'])->name('brand');
    Route::view('detail', 'user.detail')->name('detail');
    Route::get('profile', [UserController::class, 'show'])->name('profile');
    Route::post('profile/{id}', [UserController::class, 'update'])->name('profile.update');
    Route::view('order', 'user.order')->name('order');
    Route::view('cart', 'user.keranjang')->name('cart');
    Route::get('wishlist', [LandingpageController::class, 'wishlist'])->name('wishlist');
    Route::get('shop', [DetailProductController::class, 'showProduct'])->name('shop');
    Route::get('store', [StoreProfileController::class, 'showStore'])->name('store');
    // Route::get('detailproduct', [DetailProductController::class, 'showDetail']);
    Route::get('open-shop', [OpenShopController::class, 'index'])->name('register-seller');
    Route::post('open-shop', [OpenShopController::class, 'register'])->name('register-seller.submit');
    Route::get('verify-store/{token:verification_code}', [OpenShopController::class, 'verifyStore'])->name('verify.store');
    Route::resource('history', HistoryController::class);
    Route::resource('update-password', UserUpdatePasswordController::class);
    Route::resource('auctions', AuctionsController::class);
    // Route::get('/product/{id}', [AuctionsController::class, 'create'])->name('product.create');
    // Route::post('/product/{id}/auction', [AuctionsController::class, 'store'])->name('product.auction.store');
});

# Dev Routes
Route::prefix('dev')->group(function () {
    Route::view('admin-view', 'admin.index');
});

# Landing Pages
Route::prefix('product')->group(function () {
    Route::get('auction', [LandingpageController::class, 'productAuction']);
    Route::get('regular', [LandingpageController::class, 'productRegular']);
});
Route::get('brand', [LandingpageController::class, 'brand']);
Route::get('stores', [StoreProfileController::class, 'showStore'])->name('store');
Route::view('detail', 'landing.detail');
Route::get('about-us', [AboutUsController::class, 'landingpage']);
Route::view('news', 'landing.detailNews');

# Home Redirect
Route::get('/home', RedirectUserController::class)->name('home');

# Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::view('/', 'admin.index')->name('index');
    Route::resource('about', AboutUsController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('product-category', ProductCategoryController::class);
    Route::resource('user', UserController::class);
    Route::resource('event', EventController::class);
    Route::resource('produk', ProductAdminController::class);

    Route::prefix('/notification')->name('notification.')->group(function () {
        Route::get('/', [NotificationController::class, 'index'])->name('index');
        Route::get('read-all', [NotificationController::class, 'readAll'])->name('readAll');
        Route::get('read/{id}', [NotificationController::class, 'read'])->name('read');
        Route::get('unread/{id}', [NotificationController::class, 'unread'])->name('unread');
        Route::get('{id}', [NotificationController::class, 'show'])->name('show');
        Route::delete('{id}', [NotificationController::class, 'destroy'])->name('destroy');
    });
});

# Store Profile Routes
Route::prefix('@{store:username}')->controller(StoreProfileController::class)->group(function () {
    Route::get('/', 'index')->name('store.profile');
    Route::get('products', 'products')->name('store.products');
    Route::get('{product:slug}', 'productDetail')->name('store.product.detail');
});
