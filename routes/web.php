<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[StoreController::class,'index']);

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);

// Route::get('/products',ProductController::class);
// Route::get('/products/{id}',ProductController::class);
// Route::post('/products',ProductController::class);
// Route::put('/products/{id}',ProductController::class);
// Route::delete('/products/{id}',ProductController::class);
// Route::get('/categories',CategoryController::class);



