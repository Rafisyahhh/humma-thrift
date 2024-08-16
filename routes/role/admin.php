<?php

use App\Http\Controllers\AdminControllers\{
  AdminController,
  AdminAboutUsController,
  AdminBrandController,
  AdminProductCategoryController,
  AdminUserController,
  AdminEventController,
  AdminStoreController,
  AdminProductController,
  AdminTransactionController,
  AdminIncomeController,
  AdminWithdrawController,
  AdminNotificationController,
};
use App\Http\Controllers\AdminFeeController;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
  Route::get('/', [AdminController::class, 'index'])->name('index');
  Route::resource('about', AdminAboutUsController::class);
  Route::resource('brand', AdminBrandController::class);
  Route::resource('product-category', AdminProductCategoryController::class);
  Route::resource('user', AdminUserController::class);
  Route::resource('event', AdminEventController::class);
  Route::resource('produk', AdminProductController::class);
  Route::resource('store', AdminStoreController::class);
  Route::resource('transaction', AdminTransactionController::class);
  Route::resource('income', AdminIncomeController::class);
  Route::resource('withdraw', AdminWithdrawController::class);
  Route::resource('adminfee', AdminFeeController::class);

  Route::prefix('/notification')->controller(AdminNotificationController::class)->name('notification.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('read-all', 'readAll')->name('readAll');
    Route::get('read/{id}', 'read')->name('read');
    Route::get('unread/{id}', 'unread')->name('unread');
    Route::get('{id}', 'show')->name('show');
    Route::delete('{id}', 'destroy')->name('destroy');
  });
});
