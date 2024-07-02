<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AboutUsController,
    AuctionsController,
    UserController,
    BrandController,
    CheckoutController,
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
    UserAddressController,
    UserStoreController
};

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
    //
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

    // Show seller product auction
    Route::get('productauction/{id}', [AuctionsController::class, 'showSeller'])->name('auction.showSeller');

    // Edit and Update routes for auctions
    Route::get('productauction/{id}/edit', [AuctionsController::class, 'edit'])->name('auction.edit');
    Route::put('productauction/{id}', [AuctionsController::class, 'update'])->name('auction.update');
});

# User Routes
Route::prefix('user')->middleware(['auth', 'role:user'])->name('user.')->group(function () {
    Route::middleware(\App\Http\Middleware\NotSellerMiddleware::class)->group(function () {
        Route::get('/', [DashboardUserController::class, 'dashboard'])->name('userhome');
        Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
        Route::post('address/{id}', [UserAddressController::class, 'store'])->name('address.store');
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
        Route::resource('history', HistoryController::class);
        Route::resource('update-password', UserUpdatePasswordController::class);
        Route::resource('auctions', AuctionsController::class);
        // Route::get('/product/{id}', [AuctionsController::class, 'create'])->name('product.create');
        // Route::post('/product/{id}/auction', [AuctionsController::class, 'store'])->name('product.auction.store');
    });

    Route::get('open-shop', [OpenShopController::class, 'index'])->name('register-seller');
    Route::post('open-shop', [OpenShopController::class, 'register'])->name('register-seller.submit');
    Route::get('verify-store/{token:verification_code}', [OpenShopController::class, 'verifyStore'])->name('verify.store');
});

# Dev Routes
Route::prefix('dev')->group(function () {
    Route::view('admin-view', 'admin.index');
});

# Landing Pages
Route::get('/product', [LandingpageController::class, 'product']);
Route::get('/brand', [LandingpageController::class, 'brand']);
Route::get('/stores', [StoreProfileController::class, 'showStore'])->name('store');
Route::view('/detail', 'landing.detail');
Route::get('/about-us', [AboutUsController::class, 'landingpage']);
Route::view('/news', 'landing.detailNews');
Route::view('/regstrasi','afterregister');

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

    Route::prefix('/notification')->controller(NotificationController::class)->name('notification.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('read-all', 'readAll')->name('readAll');
        Route::get('read/{id}', 'read')->name('read');
        Route::get('unread/{id}', 'unread')->name('unread');
        Route::get('{id}', 'show')->name('show');
        Route::delete('{id}', 'destroy')->name('destroy');
    });
});

# Store Profile Routes
Route::prefix('@{store:username}')->controller(StoreProfileController::class)->group(function () {
    Route::get('/', 'index')->name('store.profile');
    Route::get('products', 'products')->name('store.products');
    Route::get('{product:slug}', 'productDetail')->name('store.product.detail');
});
