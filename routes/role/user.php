<?php
use App\Http\Controllers\{
  AuctionsController,
  UserController,
  CartController,
  CheckoutController,
  DashboardUserController,
  LandingpageController,
  StoreProfileController,
  UserUpdatePasswordController,
  OpenShopController,
  DetailProductController,
  HistoryController,
  UserAddressController,
  OrderController,
  Payment\TransactionController
};

Route::prefix('user')->middleware(['auth', 'role:user'])->name('user.')->group(function () {
  Route::middleware([\App\Http\Middleware\NotSellerMiddleware::class])->group(function () {
    Route::get('/', [DashboardUserController::class, 'dashboard'])->name('userhome');

    Route::controller(CheckoutController::class)->prefix('/checkout')->group(function () {
      Route::get('/', 'index')->name('checkout');
      Route::get('/lelang', 'indexCoLelang')->name('checkout.lelang');
      Route::post('process', 'processCheckout')->name('checkout.process');
      Route::post('process/auction', 'processCheckoutAuction')->name('checkout.process.auction');
    });

    Route::post('ulasan', [HistoryController::class, 'store'])->name('ulasan');
    Route::post('ulasan/lelang/{id}', [HistoryController::class, 'storeLelang'])->name('ulasan.lelang');
    Route::post('address/{id}', [UserAddressController::class, 'store'])->name('address.store');
    Route::put('edit/address/{user}/{address}', [UserAddressController::class, 'update'])->name('address.edit');
    Route::put('main/address/{address}', [UserAddressController::class, 'main'])->name('address.main');
    Route::delete('delete/address/{address}', [UserAddressController::class, 'destroy'])->name('address.destroy');
    # Soft delete Address
    Route::get('/address/restore/{id}', [UserAddressController::class, 'restore'])->name('address.restore');
    Route::get('/address/delete/{id}', [UserAddressController::class, 'delete'])->name('address.delete');
    Route::view('detail', 'user.detail')->name('detail');
    Route::get('profile', [UserController::class, 'show'])->name('profile');
    Route::post('profile/{id}', [UserController::class, 'update'])->name('profile.update');
    Route::get('order', [OrderController::class, 'index'])->name('order');
    Route::post('orderupdate/{transaction}', [OrderController::class, 'updateOrder'])->name('order.update');
    Route::get('cart', [CartController::class, 'index'])->name('cart');

    Route::get('wishlist', [LandingpageController::class, 'wishlist'])->name('wishlist');
    Route::get('shop', [DetailProductController::class, 'showProduct'])->name('shop');
    Route::get('store', [StoreProfileController::class, 'showStore'])->name('store');
    // Route::get('detailproduct', [DetailProductController::class, 'showDetail']);
    Route::resource('history', HistoryController::class);
    Route::resource('update-password', UserUpdatePasswordController::class);
    Route::resource('auctions', AuctionsController::class);
    // Route::get('/product/{id}', [AuctionsController::class, 'create'])->name('product.create');
    // Route::post('/product/{id}/auction', [AuctionsController::class, 'store'])->name('product.auction.store');
    Route::get('notify', [AuctionsController::class, 'notify'])->name('notify');
    Route::get('/test-notification', [AuctionsController::class, 'testNotification']);
    Route::get('location', [UserAddressController::class, 'index'])->name('location');
    Route::prefix('/notification')->controller(AuctionsController::class)->name('notification.')->group(function () {
      Route::get('/', 'notifyuser')->name('index');
      Route::post('/{notificationId}', 'notifyshow')->name('show');
      Route::get('/read-all', 'readAll')->name('readAll');
      Route::delete('{id}', 'destroynotify')->name('destroy');
    });
    # Payment Routes
    Route::prefix('payment')->group(function () {
      Route::post('transaction/store', [TransactionController::class, 'store'])->name('transaction.store');
      Route::post('transaction/store/lelang', [TransactionController::class, 'storeLelang'])->name('transaction.store.lelang');
      Route::get('transaction/{reference}', [TransactionController::class, 'show'])->name('transaction.show');
    });
  });

  Route::get('open-shop', [OpenShopController::class, 'index'])->name('register-seller');
  Route::post('open-shop', [OpenShopController::class, 'register'])->name('register-seller.submit');
  Route::get('verify-store/{token:verification_code}', [OpenShopController::class, 'verifyStore'])->name('verify.store');
});