<?php

use App\Http\Controllers\AdminauthController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerProductController;
use App\Http\Middleware\CheckAdminMiddleware;
use App\Http\Middleware\CheckCustomerMiddleware;
use Illuminate\Support\Facades\Route;


///
// Admin routes
Route::middleware(['auth', 'checkAdmin'])->group(function () {
    // Admin-specific routes here
    Route::get('/', [CheckAdminMiddleware::class, 'dashboard'])->name('admin.dashboard');
    // Other admin routes...
});

// Customer routes
Route::middleware(['auth', 'checkCustomer'])->group(function () {
    // Customer-specific routes here
    Route::get('/customer/dashboard', [CheckCustomerMiddleware::class, 'dashboard'])->name('customer.dashboard');
    // Other customer routes...
});


///
Route::get('/',function(){
    return view('admin.layout');
});
//CATEGORY INDEX
Route::get('categoryIndex', [AdminCategoryController::class,'index'])->name('admin.category.index');

//CATEGORY CREATE
Route::get('categoryCreate', [AdminCategoryController::class,'create'])->name('admin.category.create');

//CATEGORY STORE
Route::post('categorySave', [AdminCategoryController::class,'save'])->name('admin.category.save');

//CATEGORY EDIT
Route::get('categoryEdit/{id}', [AdminCategoryController::class,'show'])->name('admin.category.edit');

//CATEGORY UPDATE
Route::post('categoryUpdate', [AdminCategoryController::class,'update'])->name('admin.category.update');

//CATEGORY DELETE
Route::delete('categoryDelete/{id}', [AdminCategoryController::class,'delete'])->name('admin.category.delete');

//PRODUCT INDEX
Route::get('bookIndex', [AdminProductController::class,'index'])->name('admin.product.index');

//PRODUCT CREATE
Route::get('bookCreate', [AdminProductController::class,'create'])->name('admin.product.create');

//PRODUCT STORE
Route::post('bookSave', [AdminProductController::class,'save'])->name('admin.product.save');

//PRODUCT EDIT
Route::get('bookEdit/{id}', [AdminProductController::class,'show'])->name('admin.product.edit');

//PRODUCT UPDATE
Route::post('bookUpdate', [AdminProductController::class,'update'])->name('admin.product.update');

//PRODUCT DELETE
Route::delete('bookDelete/{id}', [AdminProductController::class,'delete'])->name('admin.product.delete');

//USER INDEX
Route::get('UserIndex',[AdminAuthController::class,'index'])->name('admin.user.index');

//ADMIN USER  LOGIN FORM

Route::get('/AdminLoginForm', [AdminAuthController::class, 'showForm'])->name('admin.login');

//VALIDATE THE ADMIN USER DETAILS
Route::post('/AdminLoginForm', [AdminAuthController::class, 'login'])->name('admin.login.post');

// LOGOUT
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');


/*------------------------------CUSTOMER ------------------------------*/

//CUSTOMER USER  LOGIN
Route::get('CustomerLoginForm',[CustomerAuthController::class,'showForm'])->name('customer.login');

//VALIDATE THE CUSTOMER USER DETAILS
Route::post('/login', [CustomerAuthController::class, 'login'])->name('customer.validation');

//CUSTOMER - SHOW THR PRODUCTS
Route::get('/Books', [CustomerProductController::class, 'index'])->name('customer.index');
