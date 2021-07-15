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

// routes of login
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('app.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authentication'])->name('app.login');


// routes of register 
Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'register'])->name('app.register');
Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'registerUser'])->name('app.register');


// routes of logout
Route::get('/logout', [\App\Http\Controllers\LogoutController::class, 'logout'])->name('app.logout');