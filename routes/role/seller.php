<?php
use App\Http\Controllers\{
  AuctionsController,
  ProductAuctionController,
  ProductController,
  NotificationSellerController,
  UserStoreController,
  OrderController,
  SellerTransactionController,
  WithdrawalController,
};

Route::prefix('seller')->middleware(['auth', 'seller'])->name('seller.')->group(function () {
  Route::get('/home', [UserStoreController::class, 'index'])->name('home');
  Route::get('/transaction', [OrderController::class, 'indexTransaction'])->name('transaction');
  Route::get('/transactiondetail/{transaction}', [OrderController::class, 'indexDetail'])->name('transaction.detail');
  Route::post('/transactiondetail/update/{transaction}', [OrderController::class, 'updateDetail'])->name('transaction.detail.update');
  Route::get('/income', [SellerTransactionController::class, 'index'])->name('income');
  // Route::view('/product', 'seller.produk')->name('product');
  Route::get('profil', [UserStoreController::class, 'show'])->name('profile');
  Route::put('/profile/{id}', [UserStoreController::class, 'update'])->name('profile.update');
  Route::resource('product', ProductController::class);
  Route::resource('productauction', ProductAuctionController::class);

  Route::prefix('notification')->controller(NotificationSellerController::class)->name('notification.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/notifications/{notificationId}', 'show')->name('show');
    Route::get('/read-all', 'readAll')->name('readAll');
    Route::delete('{id}', 'destroy')->name('destroy');
  });

  // Show seller product auction
  Route::get('auction/seller/{id}', [AuctionsController::class, 'showSeller'])->name('auction.showSeller');

  // Edit and Update routes for auctions
  Route::get('auction/{auctions}/edit', [AuctionsController::class, 'editlelang'])->name('auction.editlelang');
  Route::put('auction/{auctions}', [AuctionsController::class, 'updatelelang'])->name('auction.updatelelang');

  Route::prefix('/withdraw')->controller(WithdrawalController::class)->group(function () {
    Route::get('/', 'indexUser')->name('withdraw.index');
    Route::get('issue', 'createUser')->name('withdraw.create');
    Route::get('{withdrawal:transaction_id}', 'detailUser')->name('withdraw.detail');
    Route::post('issue', 'issueUser')->name('withdraw.issue');
  });
});
