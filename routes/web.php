<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Autenticación
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Dashboard Cliente
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Dashboard Admin
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {
    return view('admin.index');
})->middleware('onlyadmin')->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| CRUD Productos (solo admin)
|--------------------------------------------------------------------------
*/

Route::get('/admin/products', function () {
    return (new ProductController)->index();
})->middleware('auth')->name('products.index');

Route::get('/admin/products/create', function () {
    return (new ProductController)->create();
})->middleware('auth')->name('products.create');

Route::post('/admin/products', function () {
    return (new ProductController)->store(request());
})->middleware('auth')->name('products.store');

Route::get('/admin/products/{product}/edit', function ($product) {
    $product = \App\Models\Product::findOrFail($product);
    return (new ProductController)->edit($product);
})->middleware('onlyadmin')->name('products.edit');

Route::put('/admin/products/{product}', function ($product) {
    $product = \App\Models\Product::findOrFail($product);
    return (new ProductController)->update(request(), $product);
})->middleware('onlyadmin')->name('products.update');

Route::delete('/admin/products/{product}', function ($product) {
    $product = \App\Models\Product::findOrFail($product);
    return (new ProductController)->destroy($product);
})->middleware('onlyadmin')->name('products.destroy');

/*
|--------------------------------------------------------------------------
| CRUD Categorías (solo admin)
|--------------------------------------------------------------------------
*/

Route::get('/admin/categories', function () {
    return (new CategoryController)->index();
})->middleware('onlyadmin')->name('categories.index');

Route::get('/admin/categories/create', function () {
    return (new CategoryController)->create();
})->middleware('onlyadmin')->name('categories.create');

Route::post('/admin/categories', function () {
    return (new CategoryController)->store(request());
})->middleware('onlyadmin')->name('categories.store');

Route::get('/admin/categories/{category}/edit', function ($category) {
    $category = \App\Models\Category::findOrFail($category);
    return (new CategoryController)->edit($category);
})->middleware('onlyadmin')->name('categories.edit');

Route::put('/admin/categories/{category}', function ($category) {
    $category = \App\Models\Category::findOrFail($category);
    return (new CategoryController)->update(request(), $category);
})->middleware('onlyadmin')->name('categories.update');

Route::delete('/admin/categories/{category}', function ($category) {
    $category = \App\Models\Category::findOrFail($category);
    return (new CategoryController)->destroy($category);
})->middleware('onlyadmin')->name('categories.destroy');
