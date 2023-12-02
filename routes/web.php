<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('admin.layout');
// });

Route::get('productIndex', [ProductController::class,'index'])->name('admin.product.index');

Route::get('productCreate', [ProductController::class,'create'])->name('admin.product.create');

Route::post('productSave', [ProductController::class,'save'])->name('admin.product.save');

Route::get('productEdit/{id}', [ProductController::class,'show'])->name('admin.product.edit');

Route::post('productUpdate', [ProductController::class,'update'])->name('admin.product.update');

Route::delete('productDelete/{id}', [ProductController::class,'delete'])->name('admin.product.delete');
