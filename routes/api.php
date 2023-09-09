<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::group(['middleware' => 'api'], function ($router) {
    // Auth
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user', [AuthController::class, 'user']);

    // Update Profil
    Route::post('user/update', [AuthController::class, 'update']);
    Route::post('user/change-password', [AuthController::class, 'changePassword']);

    // List Category
    Route::get('category', [ProductController::class, 'indexCategory']);

    // Transaksi
    Route::get('user/transaction/all', [TransactionController::class, 'indexAll']);
    Route::get('user/transaction', [TransactionController::class, 'index']);
    Route::get('user/transaction/{id}', [TransactionController::class, 'show']);
    Route::post('user/transaction', [TransactionController::class, 'store']);
    Route::post('user/transaction/{id}', [TransactionController::class, 'update']);
    Route::delete('user/transaction/{id}', [TransactionController::class, 'destroy']);
    Route::post('user/transaction/status/{id}', [TransactionController::class, 'updateStatus']);

    // Notif & History & Cart
    Route::get('user/cart', [TransactionController::class, 'indexCart']);
    Route::get('user/cart/{id}', [TransactionController::class, 'indexCartDetail']);
    Route::get('user/history', [TransactionController::class, 'indexHistory']);
    Route::get('user/notification', [TransactionController::class, 'indexNotification']);
    Route::post('user/notification/{id}', [TransactionController::class, 'readNotification']);

    // Wishlist
    // Route::get('user/wishlist/all', [WishlistController::class, 'indexAll']);
    // Route::get('user/wishlist', [WishlistController::class, 'index']);
    // Route::post('user/wishlist', [WishlistController::class, 'store']);
    // Route::delete('user/wishlist/{id}', [WishlistController::class, 'destroy']);
});

// Product
Route::apiResource('product', ProductController::class);
