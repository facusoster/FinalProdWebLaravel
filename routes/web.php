<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

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

// Dashboard admin
Route::get('/admin', function () {
    abort_unless(auth()->check() && auth()->user()->role === 'admin', 403);
    return view('admin.index');
})->middleware('auth')->name('admin.dashboard');


// -----------------------------
// CRUD Categorías (solo admin)
// -----------------------------
Route::get('/admin/categories', function () {
    abort_unless(auth()->check() && auth()->user()->role === 'admin', 403);
    return app(CategoryController::class)->index();
})->middleware('auth')->name('categories.index');

Route::get('/admin/categories/create', function () {
    abort_unless(auth()->check() && auth()->user()->role === 'admin', 403);
    return app(CategoryController::class)->create();
})->middleware('auth')->name('categories.create');

Route::post('/admin/categories', function () {
    abort_unless(auth()->check() && auth()->user()->role === 'admin', 403);
    return app(CategoryController::class)->store(request());
})->middleware('auth')->name('categories.store');

Route::get('/admin/categories/{category}/edit', function ($category) {
    abort_unless(auth()->check() && auth()->user()->role === 'admin', 403);
    return app(CategoryController::class)->edit(\App\Models\Category::findOrFail($category));
})->middleware('auth')->name('categories.edit');

Route::put('/admin/categories/{category}', function ($category) {
    abort_unless(auth()->check() && auth()->user()->role === 'admin', 403);
    return app(CategoryController::class)->update(request(), \App\Models\Category::findOrFail($category));
})->middleware('auth')->name('categories.update');

Route::delete('/admin/categories/{category}', function ($category) {
    abort_unless(auth()->check() && auth()->user()->role === 'admin', 403);
    return app(CategoryController::class)->destroy(\App\Models\Category::findOrFail($category));
})->middleware('auth')->name('categories.destroy');
