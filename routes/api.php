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
    Route::post('/amd/create-product',[\App\Http\Controllers\Api\ProductController::class, 'store']);
    

});

Route::get('/', [\App\Http\Controllers\Api\IndexController::class, 'index'] );
Route::get('/product/{id}', [\App\Http\Controllers\Api\ProductController::class, 'index'] );
Route::get('/product/comment/view/{id}', [\App\Http\Controllers\Api\CommentController::class, 'show'] );
Route::get('/category', [\App\Http\Controllers\Api\CategoryController::class, 'index'] );


