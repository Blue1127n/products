<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{productId}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/register', [ProductController::class, 'create'])->name('products.register');
Route::post('/products/register', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{productId}/update', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/{productId}/update', [ProductController::class, 'update'])->name('products.update');
Route::post('/products/{productId}/delete', [ProductController::class, 'destroy'])->name('products.destroy');
