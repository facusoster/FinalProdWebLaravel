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
    Route::middleware(['auth'])->prefix('admin')->name('products.')->group(function () {

    Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])
        ->name('index');

    Route::get('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])
        ->name('create');

    Route::post('/products', [\App\Http\Controllers\ProductController::class, 'store'])
        ->name('store');

    Route::get('/products/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])
        ->name('edit');

    Route::put('/products/{product}', [\App\Http\Controllers\ProductController::class, 'update'])
        ->name('update');

    Route::delete('/products/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])
        ->name('destroy');
});


/*
|--------------------------------------------------------------------------
| CRUD Categorías (solo admin)
|--------------------------------------------------------------------------
*/

    Route::middleware(['auth'])->prefix('admin')->name('categories.')->group(function () {

    Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])
        ->name('index');

    Route::get('/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])
        ->name('create');

    Route::post('/categories', [\App\Http\Controllers\CategoryController::class, 'store'])
        ->name('store');

    Route::get('/categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])
        ->name('edit');

    Route::put('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])
        ->name('update');

    Route::delete('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])
        ->name('destroy');
});



/*
|--------------------------------------------------------------------------
| CRUD Pedidos (solo admin)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {

        // Panel de pedidos
        Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])
            ->name('orders.index');

        Route::get('/orders/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])
            ->name('orders.show');

        Route::put('/orders/{order}/status', [\App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])
            ->name('orders.updateStatus');

        Route::put('/orders/{order}/cancel', [\App\Http\Controllers\Admin\OrderController::class, 'cancel'])
            ->name('orders.cancel');
    });
});
