<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\ArtikelController;

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

Route::group(['prefix' => 'admin'], function () {
    Route::post('/', [AdminController::class, 'create']);
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/{id}', [AdminController::class, 'show']);
    Route::put('/{id}', [AdminController::class, 'update']);
    Route::delete('/{id}', [AdminController::class, 'delete']);
});

Route::group(['prefix' => 'donatur'], function () {
    Route::post('/', [DonaturController::class, 'create']);
    Route::get('/', [DonaturController::class, 'index']);
    Route::get('/{id}', [DonaturController::class, 'show']);
    Route::put('/{id}', [DonaturController::class, 'update']);
    Route::delete('/{id}', [DonaturController::class, 'delete']);
});

Route::group(['prefix' => 'donasi'], function () {
    Route::post('/', [DonasiController::class, 'create']);
    Route::get('/', [DonasiController::class, 'index']);
    Route::get('/{id}', [DonasiController::class, 'show']);
    Route::put('/{id}', [DonasiController::class, 'update']);
    Route::delete('/{id}', [DonasiController::class, 'delete']);
});

Route::group(['prefix' => 'artikel'], function () {
    Route::post('/', [ArtikelController::class, 'create']);
    Route::get('/', [ArtikelController::class, 'index']);
    Route::get('/{id}', [ArtikelController::class, 'show']);
    Route::put('/{id}', [ArtikelController::class, 'update']);
    Route::delete('/{id}', [ArtikelController::class, 'delete']);
});
