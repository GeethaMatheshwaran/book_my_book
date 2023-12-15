<?php

use App\Http\Controllers\AdminauthController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerCartController;
use App\Http\Controllers\CustomerProductController;
use Illuminate\Support\Facades\Route;


Route::middleware('admin.auth')->group(function () {
    //CATEGORY INDEX
    Route::get('categoryIndex', [AdminCategoryController::class, 'index'])->name('admin.category.index');

    //CATEGORY CREATE
    Route::get('categoryCreate', [AdminCategoryController::class, 'create'])->name('admin.category.create');

    //CATEGORY STORE
    Route::post('categorySave', [AdminCategoryController::class, 'save'])->name('admin.category.save');

    //CATEGORY EDIT
    Route::get('categoryEdit/{id}', [AdminCategoryController::class, 'show'])->name('admin.category.edit');

    //CATEGORY UPDATE
    Route::post('categoryUpdate', [AdminCategoryController::class, 'update'])->name('admin.category.update');

    //CATEGORY DELETE
    Route::delete('categoryDelete/{id}', [AdminCategoryController::class, 'delete'])->name('admin.category.delete');

    //PRODUCT INDEX
    Route::get('bookIndex', [AdminProductController::class, 'index'])->name('admin.product.index');

    Route::get('BookIndex', [AdminProductController::class, 'index'])->name('admin.product.index');

    //PRODUCT CREATE
    Route::get('bookCreate', [AdminProductController::class, 'create'])->name('admin.product.create');

    //PRODUCT STORE
    Route::post('bookSave', [AdminProductController::class, 'save'])->name('admin.product.save');

    //PRODUCT EDIT
    Route::get('bookEdit/{id}', [AdminProductController::class, 'show'])->name('admin.product.edit');

    //PRODUCT UPDATE
    Route::post('bookUpdate', [AdminProductController::class, 'update'])->name('admin.product.update');

    //PRODUCT DELETE
    Route::delete('bookDelete/{id}', [AdminProductController::class, 'delete'])->name('admin.product.delete');

    //USER INDEX
    Route::get('UserIndex', [AdminAuthController::class, 'index'])->name('admin.user.index');

});

//ADMIN USER  LOGIN FORM

Route::get('/AdminLoginForm', [AdminAuthController::class, 'showForm'])->name('admin.login');

//VALIDATE THE ADMIN USER DETAILS
Route::post('/AdminLoginForm', [AdminAuthController::class, 'login'])->name('admin.login.post');

// LOGOUT
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');


/*------------------------------CUSTOMER ------------------------------*/

//CUSTOMER USER  LOGIN
Route::get('CustomerLoginForm', [CustomerAuthController::class, 'showForm'])->name('customer.login');

//VALIDATE THE CUSTOMER USER DETAILS
Route::post('/login', [CustomerAuthController::class, 'login'])->name('customer.validation');

Route::middleware('customer.auth')->group(function () {

    //CUSTOMER - SHOW THR PRODUCTS
    Route::get('/', [CustomerProductController::class, 'index'])->name('customer.product.list');

    // ADD TO CART
    Route::post('/addToCart/{bookId}', [CustomerCartController::class, 'addToCart'])->name('addToCart');

    //CHECKOUT
    Route::get('/checkout', [CustomerCartController::class, 'checkout'])->name('checkout');

    //PLACE ORDER
    Route::post('/placeOrder', [CustomerCartController::class, 'placeOrder'])->name('placeOrder');

});
