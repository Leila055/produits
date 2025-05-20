<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/',[StoreController::class,'index'])->name('home');

Route::middleware(['admin'])->group(function(){

    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin_dashboard');
});



Auth::routes();

