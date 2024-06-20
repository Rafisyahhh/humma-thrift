<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AboutUsController,
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
    RedirectUserController
};
use App\Models\User;
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
Route::prefix('/debug')->group(function () {
    Route::view('home', 'debug.home');
    Route::view('modal', 'debug.modal');

    // Route::get('store', function () {
    //     $users = User::all(); // Assuming user with ID 1 exists

    //     if (!$users) {
    //         abort(404, 'User not found');
    //     }

    //     // Send welcome notification to the user
    //     try {
    //         Notification::send($users, new SellerWelcomeNotification([
    //             'message' => 'You have a new notification',
    //             'action' => url('/notifications'),
    //         ]));
    //     } catch (\Exception $e) {
    //         return $e;
    //     }
    // });
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
    // Route::view('/tambahproduk', 'seller.tambahproduk')->name('tambahproduk');
    Route::resource('produk', ProductController::class);
    Route::resource('produkauction', ProductAuctionController::class);
});

# User Routes
Route::prefix('user')->middleware(['auth', 'role:user'])->name('user.')->group(function () {
    Route::view('/home', 'user.user')->name('home');
    Route::view('/product/detail', 'user.detailproduct')->name('detailproduct');
    Route::get('/userhome', [DashboardUserController::class, 'dashboard'])->name('userhome');
    // Route::view('/detailproduct', 'user.detailproduct')->name('detailproduct');
    Route::view('/checkout', 'user.checkout')->name('checkout');
    Route::view('/about', 'user.tentang')->name('about');
    Route::view('/brand', 'user.merek')->name('brand');
    Route::view('/detail', 'user.detail')->name('detail');
    Route::view('/profile', 'user.profil')->name('profile');
    Route::view('/order', 'user.order')->name('order');
    Route::view('/cart', 'user.keranjang')->name('cart');
    Route::view('/wishlist', 'user.wishlist')->name('wishlist');
    Route::view('/shop', 'user.shop')->name('shop');
    Route::view('/store', 'user.store')->name('store');
    Route::view('/history', 'user.history')->name('history');
    Route::view('/update-password', 'user.updatepassword')->name('updatePassword');

    Route::get('/open-shop', [OpenShopController::class, 'index'])->name('register-seller');
    Route::post('/open-shop', [OpenShopController::class, 'register'])->name('register-seller');
    Route::get('/verify-store/{token:verification_code}', [OpenShopController::class, 'verifyStore'])->name('verify.store');
    Route::resource('update-password', UserUpdatePasswordController::class);
});

# Dev Routes
Route::prefix('dev')->group(function () {
    Route::view('/admin-view', 'admin.index');
});

# Landing Pages
Route::view('/product', 'landing.produk');
Route::view('/brandindex', 'landing.brand');
Route::view('/store', 'landing.toko');
Route::view('/detail', 'landing.detail');
Route::get('/about-us', [AboutUsController::class, 'landingpage']);
Route::view('/contact-us', 'landing.detailContactus');
Route::view('/news', 'landing.detailNews');

# Home Redirect
Route::get('/home', RedirectUserController::class)->name('home');

# Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::view('/', 'admin.index')->name('index');
    Route::resource('about', AboutUsController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('category', ProductCategoryController::class);
    Route::resource('user', UserController::class);
    Route::resource('event', EventController::class);
    Route::resource('notification', NotificationController::class);
});

# Store Profile Routes
Route::prefix('@{store:username}')->group(function () {
    Route::get('/', [StoreProfileController::class, 'index'])->name('store.profile');
    Route::get('/products', [StoreProfileController::class, 'products'])->name('store.products');
});
