<?php

use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductApiController::class, 'index']);
Route::get('/products/{id}', [ProductApiController::class, 'show']);

Route::middleware(['web'])->group(function () {
    Route::get('/orders', [OrderApiController::class, 'index']);
});
