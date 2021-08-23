<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\IndexController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[AuthController::class, 'login']);
Route::post('/register',[AuthController::class, 'register']);

Route::group(['middleware' => ['jwt']], function (){
    Route::get('/login',[UserController::class, 'index']);
    Route::post('/product/comment',[CommentController::class, 'index']);
    Route::get('/cart/{id}',[CartController::class, 'index']);
    Route::get('/add/cart/{id_user}/{id_product}',[CartController::class, 'store']);
    Route::get('/remove/cart/{id_user}/{id_product}',[CartController::class, 'destroy']);
    Route::get('/product/delete/{id_product}',[ProductController::class, 'destroy']);
    Route::get('/category/delete/{id_product}',[CategoryController::class, 'destroy']);
    
    Route::post('/amd/create-product',[ProductController::class, 'store']);
    Route::post('/adm/create-category',[CategoryController::class, 'store']);
    Route::post('/product/edit/{id}',[ProductController::class, 'update']);
    Route::get('/verify',[ProductController::class, 'index']);
    Route::post('/manangeCategory', [CategoryController::class, 'show'] );

});

Route::get('/', [IndexController::class, 'index'] );
Route::post('/search', [ProductController::class, 'search'] );
Route::post('/searchCategory', [CategoryController::class, 'search'] );
Route::get('/product/{id}', [ProductController::class, 'index'] );
Route::get('/manangeProduct', [ProductController::class, 'show'] );
Route::get('/product/comment/view/{id}', [CommentController::class, 'show'] );
Route::get('/category', [CategoryController::class, 'index'] );

Route::get('/category/name/{id}', [CategoryController::class, 'name'] );
Route::get('/category/filter/{id}', [CategoryController::class, 'filter'] );
    


