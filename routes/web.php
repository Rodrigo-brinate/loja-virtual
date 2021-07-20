<?php

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
//route of home page
Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('app.index');
Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'index'])->name('app.productIndex');

// routes of login
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('app.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authentication'])->name('app.login');


// routes of register 
Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'register'])->name('app.register');
Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'registerUser'])->name('app.register');


// routes of logout
Route::get('/logout', [\App\Http\Controllers\LogoutController::class, 'logout'])->name('app.logout');

// routes of administrator
Route::get('/adm', [\App\Http\Controllers\IndexAdmController::class, 'index'])->name('adm.index');

// routes for add products
Route::get('/addProduct', [\App\Http\Controllers\AddProductController::class, 'index'])->name('adm.addProduct');
Route::post('/addProduct', [\App\Http\Controllers\AddProductController::class, 'add'])->name('adm.addProduct');

Route::get('/viewProduct', [\App\Http\Controllers\ViewProductController::class, 'index'])->name('adm.viewProduct');

Route::get('/delete/{id}', [\App\Http\Controllers\DeleteProductController::class, 'index'])->name('adm.delete');
Route::get('/edit/{id}', [\App\Http\Controllers\EditProductController::class, 'index'])->name('adm.edit');
Route::post('/edit/{id}', [\App\Http\Controllers\EditProductController::class, 'edit'])->name('adm.edit');



Route::get('/addCategory', [\App\Http\Controllers\AddCategoryController::class, 'index'])->name('adm.addCategory');
Route::post('/addCategory', [\App\Http\Controllers\AddCategoryController::class, 'add'])->name('adm.addCategory');


Route::get('/categoryView', [\App\Http\Controllers\CategoryViewController::class, 'index'])->name('adm.categoryView');
Route::get('/delete/category/{id}', [\App\Http\Controllers\DeleteCategoryController::class, 'index'])->name('adm.delete');
Route::get('/edit/category/{id}', [\App\Http\Controllers\EditCategoryController::class, 'index'])->name('adm.edit');
Route::post('/edit/category/{id}', [\App\Http\Controllers\EditCategoryController::class, 'edit'])->name('adm.edit');
