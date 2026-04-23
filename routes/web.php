<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Client\CatalogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Rutas de administrador
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('variants', ProductVariantController::class);
});

/*
|--------------------------------------------------------------------------
| Rutas de empleado
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:empleado'])->prefix('empleado')->group(function () {
    Route::get('/dashboard', function () {
        return "Dashboard Empleado";
    })->name('empleado.dashboard');
});

/*
|--------------------------------------------------------------------------
| Rutas de cliente
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:cliente'])->prefix('cliente')->group(function () {
    Route::get('/dashboard', function () {
        return "Dashboard Cliente";
    })->name('cliente.dashboard');

    Route::get('/catalogo', [CatalogController::class, 'index'])->name('cliente.catalogo');

    Route::get('/carrito', function () {
        return view('cliente.carrito');
    })->name('cliente.carrito');

    Route::get('/ticket', function () {
        return view('cliente.ticket');
    })->name('cliente.ticket');
});

require __DIR__.'/auth.php';