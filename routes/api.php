<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login',[\App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('/register',[\App\Http\Controllers\Api\AuthController::class, 'register']);

Route::group(['middleware' => ['jwt']], function (){
    Route::get('/login',[\App\Http\Controllers\Api\UserController::class, 'index']);
    Route::post('/product/comment',[\App\Http\Controllers\Api\CommentController::class, 'index']);
    Route::get('/cart/{id}',[\App\Http\Controllers\Api\CartController::class, 'index']);
    Route::get('/add/cart/{id_user}/{id_product}',[\App\Http\Controllers\Api\CartController::class, 'store']);
    Route::get('/remove/cart/{id_user}/{id_product}',[\App\Http\Controllers\Api\CartController::class, 'destroy']);
    Route::get('/product/delete/{id_product}',[\App\Http\Controllers\Api\ProductController::class, 'destroy']);
    Route::post('/amd/create-product',[\App\Http\Controllers\Api\ProductController::class, 'store']);
    Route::post('/product/edit/{id}',[\App\Http\Controllers\Api\ProductController::class, 'update']);
    Route::get('/verify',[\App\Http\Controllers\Api\ProductController::class, 'index']);
    

});

Route::get('/', [\App\Http\Controllers\Api\IndexController::class, 'index'] );
Route::get('/product/{id}', [\App\Http\Controllers\Api\ProductController::class, 'index'] );
Route::get('/product/comment/view/{id}', [\App\Http\Controllers\Api\CommentController::class, 'show'] );
Route::get('/category', [\App\Http\Controllers\Api\CategoryController::class, 'index'] );
Route::get('/category/filter/{id}', [\App\Http\Controllers\Api\CategoryController::class, 'filter'] );
Route::get('/category/name/{id}', [\App\Http\Controllers\Api\CategoryController::class, 'name'] );
Route::post('/search', [\App\Http\Controllers\Api\ProductController::class, 'search'] );
Route::get('/manangeProduct', [\App\Http\Controllers\Api\ProductController::class, 'show'] );
    


