<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductVariantController;

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

Route::get('/admin/dashboard', function () {
    return "Dashboard Admin";
})->middleware(['auth']);

Route::get('/empleado/dashboard', function () {
    return "Dashboard Empleado";
})->middleware(['auth']);

Route::get('/cliente/dashboard', function () {
    return "Dashboard Cliente";
})->middleware(['auth']);


Route::get('/admin/dashboard', function () {
    return "Dashboard Admin";
})->middleware(['auth', 'role:admin']);

Route::get('/empleado/dashboard', function () {
    return "Dashboard Empleado";
})->middleware(['auth', 'role:empleado']);

Route::get('/cliente/dashboard', function () {
    return "Dashboard Cliente";
})->middleware(['auth', 'role:cliente']);   

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return "Dashboard Admin";
    });

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('variants', ProductVariantController::class);
});

Route::get('/empleado/dashboard', function () {
    return "Dashboard Empleado";
})->middleware(['auth', 'role:empleado']);

Route::get('/cliente/dashboard', function () {
    return "Dashboard Cliente";
})->middleware(['auth', 'role:cliente']);



require __DIR__.'/auth.php';
