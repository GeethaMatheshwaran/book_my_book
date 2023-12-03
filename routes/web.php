<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

//PRODUCT INDEX
Route::get('Book', [ProductController::class,'index'])->name('admin.product.index');

//PRODUCT CREATE
Route::get('BookCreate', [ProductController::class,'create'])->name('admin.product.create');

//PRODUCT STORE
Route::post('BookSave', [ProductController::class,'save'])->name('admin.product.save');

//PRODUCT EDIT
Route::get('BookEdit/{id}', [ProductController::class,'show'])->name('admin.product.edit');

//PRODUCT UPDATE
Route::post('BookUpdate', [ProductController::class,'update'])->name('admin.product.update');

//PRODUCT DELETE
Route::delete('BookDelete/{id}', [ProductController::class,'delete'])->name('admin.product.delete');

//CATEGORY INDEX
Route::get('category', [CategoryController::class,'index'])->name('admin.category.index');

//CATEGORY CREATE
Route::get('categoryCreate', [CategoryController::class,'create'])->name('admin.category.create');

//CATEGORY STORE
Route::post('categorySave', [CategoryController::class,'save'])->name('admin.category.save');

//CATEGORY EDIT
Route::get('categoryEdit/{id}', [CategoryController::class,'show'])->name('admin.category.edit');

//CATEGORY UPDATE
Route::post('categoryUpdate', [CategoryController::class,'update'])->name('admin.category.update');

//CATEGORY DELETE
Route::delete('categoryDelete/{id}', [CategoryController::class,'delete'])->name('admin.category.delete');

//USER INDEX
Route::get('User',[UserController::class,'index'])->name('admin.user.index');
