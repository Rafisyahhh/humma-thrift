<?php
use App\Http\Controllers\{
  AboutUsController,
  CartController,
  LandingpageController,
  StoreProfileController,
  FavoriteController,
  RedirectUserController,
};

Route::get('/', [LandingpageController::class, 'index']);
Route::get('/home', RedirectUserController::class)->name('home');
Route::get('brand', [LandingpageController::class, 'brand']);
Route::get('stores', [StoreProfileController::class, 'showStore'])->name('store');
Route::view('detail', 'landing.detail');
Route::get('about-us', [LandingpageController::class, 'aboutUs']);
Route::view('news', 'landing.detailNews');
Route::view('/regstrasi', 'afterregister');

Route::prefix('product')->group(function () {
  Route::get('/', [LandingpageController::class, 'productSearch'])->name('searchProduct');
  Route::get('auction', [LandingpageController::class, 'productAuction']);
  Route::get('regular', [LandingpageController::class, 'productRegular']);
  Route::middleware(["role:user"])->group(function () {
    Route::post('storecart/{product}', [CartController::class, 'storecart'])->name('storecart');
    Route::post('storesproduct/{product}', [FavoriteController::class, 'storesproduct'])->name('storesproduct');
    Route::delete('deletecart/{cart}', [CartController::class, 'deletecart'])->name('deletecart');
  });
});

#wishlist product
Route::delete('/destroyProduct/{destroy}', [FavoriteController::class, 'destroyProduct'])->name('destroyProduct.destroy');
#wishlist product Auction
Route::post('/productAuction/storesproductAuction/{productAuction}', [FavoriteController::class, 'storesproductAuction'])->name('storesproductAuction');
Route::delete('/destroyAuction/{destroyAuction}', [FavoriteController::class, 'destroyAuction'])->name('destroyAuction.destroy');