<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Auth
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// Dashboard cliente
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Panel admin SIN Kernel
Route::get('/admin', function () {
    abort_unless(auth()->check() && auth()->user()->role === 'admin', 403);
    return view('admin.index');
})->middleware('auth')->name('admin.dashboard');
