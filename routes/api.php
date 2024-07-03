<?php

use App\Http\Controllers\ApiControllers\BrandApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiControllers\YajraController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth')->name("api.")->group(function () {
    Route::get('/user', [UserApiController::class, 'getUser']);
    Route::post('/brand', [BrandApiController::class, 'storeBrand'])->name("storeBrand");
    Route::put('/brand/{brand}', [BrandApiController::class, 'updateBrand'])->name("updateBrand");
    Route::delete('/brand/{brand}', [BrandApiController::class, 'deleteBrand'])->name("deleteBrand");
});
Route::prefix('yajra')->name('yajra.')->group(function () {
    Route::get('/user', [YajraController::class, 'getUser']);
    Route::get('/brand', [YajraController::class, 'brands'])->name("brands");
    Route::get('/category', [YajraController::class, 'categories'])->name("categories");
});