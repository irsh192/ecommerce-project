<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get("/", [HomeController::class, "home"]);

Route::get("/dashboard", [HomeController::class, "login_home"])->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'admin']);

Route::get('view_category', [AdminController::class, 'view_category'])
    ->middleware(['auth', 'admin'])->name('view_category');

Route::post('add_category', [AdminController::class, 'add_category'])
    ->middleware(['auth', 'admin'])->name(name: 'add_category');

Route::get('delete_category/{id}', [AdminController::class, 'delete_category'])
    ->middleware(['auth', 'admin'])->name(name: 'delete_category');

Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])
    ->middleware(['auth', 'admin'])->name(name: 'edit_category');

Route::put('update_category/{id}', [AdminController::class, 'update_category'])
    ->middleware(['auth', 'admin'])->name('update_category');

Route::get('add_product', [AdminController::class, 'add_product'])
    ->middleware(['auth', 'admin'])->name(name: 'add_product');

Route::post('upload_product', [AdminController::class, 'upload_product'])
    ->middleware(['auth', 'admin'])->name(name: 'upload_product');


Route::get('view_product', [AdminController::class, 'view_product'])
    ->middleware(['auth', 'admin'])->name(name: 'view_product');

Route::get('edit_product/{id}', [AdminController::class, 'edit_product'])
    ->middleware(['auth', 'admin'])->name(name: 'edit_product');

Route::put('update_product/{id}', [AdminController::class, 'update_product'])
    ->middleware(middleware: ['auth', 'admin'])->name(name: 'update_product');


Route::delete('delete_product/{id}', [AdminController::class, 'delete_product'])
    ->middleware(['auth', 'admin'])->name(name: 'delete_product');

Route::get('product_search', [AdminController::class, 'product_search'])
    ->middleware(['auth', 'admin'])->name(name: 'product_search');

Route::get('product_details/{id}', [HomeController::class, 'product_details'])
    ->name(name: 'product_details');


Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])
    ->middleware(['auth']) // Use only 'auth' if regular users need access
    ->name('add_cart');

Route::get('mycart', [HomeController::class, 'mycart'])
    ->middleware(['auth']) // Use only 'auth' if regular users need access
    ->name('mycart');
