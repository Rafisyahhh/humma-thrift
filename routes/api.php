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
    // Route::get('/user', [UserApiController::class, 'getUser']);
    Route::post('/brand', [BrandApiController::class, 'storeBrand'])->name("storeBrand");
    Route::put('/brand/{brand}', [BrandApiController::class, 'updateBrand'])->name("updateBrand");
    Route::delete('/brand/{brand}', [BrandApiController::class, 'deleteBrand'])->name("deleteBrand");
});
Route::prefix('yajra')->name('yajra.')->group(function () {
    Route::get('/user', [YajraController::class, 'users'])->name("users");
    Route::get('/brand', [YajraController::class, 'brands'])->name("brands");
    Route::get('/category', [YajraController::class, 'categories'])->name("categories");
    Route::get('/event', [YajraController::class, 'events'])->name("events");
    Route::get('/product', [YajraController::class, 'products'])->name("products");
    Route::get('/about', [YajraController::class, 'abouts'])->name("abouts");
    Route::get('/store', [YajraController::class, 'stores'])->name("stores");
    Route::get('/transaction', [YajraController::class, 'transactions'])->name("transactions");
    Route::get('/income', [YajraController::class, 'incomes'])->name("incomes");
    Route::get('/withdrawal', [YajraController::class, 'withdrawal'])->name("withdrawal");
});

Route::get('/whatsapp', function (Request $request) {
    $phone_number = $request->phone ?? 6285707062531;
    $message = $request->text ?? "Permisi%20saya%20%5Bnama%20seller%5D%20melakukan%20penarikan%20dana%20sejumlah%20%5BRp.%20jumlah%20penarikan%5D%20pada%20tanggal%20%5B%20tanggal%20penarikan%20%5D%20memohon%20untuk%20segera%20disetujui";
    return redirect("whatsapp://send?phone=$phone_number&text=$message");
})->name('whatsapp');