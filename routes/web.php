<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

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
Route::get('/', [IndexController::class, 'index'])->name('app.index');
Route::get('/product/{id}', [ProductController::class, 'index'])->name('app.productIndex');

// routes of login
Route::get('/login', [LoginController::class, 'login'])->name('app.login');
Route::post('/login', [LoginController::class, 'authentication'])->name('app.login');

// routes of logout
Route::get('/logout', [LoginController::class, 'logout'])->name('app.logout');


// routes of register 
Route::get('/register', [RegisterController::class, 'register'])->name('app.register');
Route::post('/register', [RegisterController::class, 'registerUser'])->name('app.register');




// routes of administrator
Route::get('/adm', [IndexAdmController::class, 'index'])->name('adm.index');



////// produtos  ////////////////////////////////////////////////////////
Route::get('/addProduct', [ProductController::class, 'create'])->name('adm.addProduct');
Route::post('/addProduct', [ProductController::class, 'store'])->name('adm.addProduct');
Route::get('/viewProduct', [ProductController::class, 'show'])->name('adm.viewProduct');
Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('adm.delete');
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('adm.edit');
Route::post('/edit/{id}', [ProductController::class, 'update'])->name('adm.edit');


//////// category //////////////////////////////////////////////
Route::get('/addCategory', [CategoryController::class, 'index'])->name('adm.addCategory');
Route::post('/addCategory', [CategoryController::class, 'create'])->name('adm.addCategory');
Route::get('/categoryView', [CategoryController::class, 'show'])->name('adm.categoryView');
Route::get('/delete/category/{id}', [CategoryController::class, 'destroy'])->name('adm.delete');
Route::get('/edit/category/{id}', [CategoryController::class, 'edit'])->name('adm.edit');
Route::post('/edit/category/{id}', [CategoryController::class, 'update'])->name('adm.edit');



Route::get('/userView', [\App\Http\Controllers\UserViewController::class, 'index'])->name('adm.userView');

///// carrinho /////////////////////////////////////////////////////
Route::get('/cart/{id}',       [CartController::class, 'create'])->name('app.addCart');
Route::get('/cart',            [CartController::class, 'index'])->name('app.cart');
Route::get('/deleteCart/{id}', [CartController::class, 'delete'])->name('app.cartDelete');


Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('app.profile');



//// favoritos //////////////////////////////////////////////////////////////
Route::post('/favorite/add',       [FavoriteController::class, 'create'])->name('app.addFavorite');
Route::get('/favorite',            [FavoriteController::class, 'index'])->name('app.favorite');
Route::get('/deleteFavorite/{id}', [FavoriteController::class, 'delete'])->name('app.favoriteDelete');


Route::post('comment/', [CommentController::class, 'create'])->name('app.addComment');
Route::get('comment/delete/{id}', [CommentController::class, 'delete'])->name('app.deleteComment');


Route::get('/manangerUser', [UserController::class, 'index'])->name('app.manangeUser');
Route::get('/edit/user/{id}', [UserController::class, 'edit'])->name('app.editUser');
Route::post('/edit/user', [UserController::class, 'update'])->name('app.updateUser');






