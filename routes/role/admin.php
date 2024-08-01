<?php

use App\Http\Controllers\{
  AdminController,
  AboutUsController,
  BrandController,
  ProductCategoryController,
  UserController,
  EventController,
  StoreController,
  ProductAdminController,
  AdminTransactionController,
  AdminIncomeController,
  AdminWithdrawController,
  NotificationController,
};


Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
  Route::get('/', [AdminController::class, 'index'])->name('index');
  Route::resource('about', AboutUsController::class);
  Route::resource('brand', BrandController::class);
  Route::resource('product-category', ProductCategoryController::class);
  Route::resource('user', UserController::class);
  Route::resource('event', EventController::class);
  Route::resource('produk', ProductAdminController::class);
  Route::resource('store', StoreController::class);
  Route::resource('transaction', AdminTransactionController::class);
  Route::resource('income', AdminIncomeController::class);
  Route::resource('withdraw', AdminWithdrawController::class);

  Route::prefix('/notification')->controller(NotificationController::class)->name('notification.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('read-all', 'readAll')->name('readAll');
    Route::get('read/{id}', 'read')->name('read');
    Route::get('unread/{id}', 'unread')->name('unread');
    Route::get('{id}', 'show')->name('show');
    Route::delete('{id}', 'destroy')->name('destroy');
  });
});