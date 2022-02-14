<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, "index"]);
Route::get('/home', [HomeController::class, "index"]);

Route::get('/login',  [AuthController::class, "indexLogin"])->middleware('guest');
Route::get('/register',  [AuthController::class, "indexRegist"])->middleware('guest');
Route::post('/api/login', [AuthController::class, "login"]);
Route::post('/api/register', [AuthController::class, "register"]);
Route::get('/api/logout', [AuthController::class, "logout"]);

Route::get('/book/{id}', [HomeController::class, "detail"])->middleware("authenticated");
Route::get('/api/add/{id}', [HomeController::class, "addtocart"]);

Route::get('/cart', [CartController::class, "index"])->middleware("authenticated");
Route::get('/api/cart/delete/{id}', [CartController::class, "delete"]);
Route::get('/api/cart/checkout', [CartController::class, "checkout"]);


Route::get('/profile', [AccountController::class, "profile"])->middleware("authenticated");
Route::post('/api/profile', [AccountController::class, "updateprofile"]);

Route::get('/manage', [AccountController::class, "management"])->middleware("admin");
Route::get('/api/user/changerole/{id}', [AccountController::class, "changeRole"]);
Route::get('/api/user/delete/{id}', [AccountController::class, "deleteUser"]);

Route::get('/language/{lang}', [HomeController::class, "setlanguage"]);
