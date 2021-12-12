<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\MyCartController;
use App\Http\Middleware\EnsureAddToCart;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class,'index']);

Route::get('/login',[AuthController::class,"login"]);
Route::get('/register',[AuthController::class,"register"]);
Route::post('/addUser',[AuthController::class,"addUser"]);
Route::post('/doLogin',[AuthController::class,"doLogin"]);
Route::get('/logout', [AuthController::class,"logout"]);
//----------temporary routes
Route::post('/updateTransaction',[MyCartController::class,"addTransaction"]);
Route::post('/updateCart',[MyCartController::class,"updateCart"]);
Route::get('/myCart',[MyCartController::class,'index']);
Route::post('/addtocart', [MyCartController::class,'insert'])->middleware(EnsureAddToCart::class);

Route::get('/home', [HomeController::class,'index']);

Route::get('/categories/{id}',[CategoryController::class,"index"]);
Route::get('/manage', [CategoryController::class,"manage"]);

Route::get('/keyboards/{id}',[KeyboardController::class,"index"]);
Route::get('/add-keyboard',[KeyboardController::class,"addIndex"]);
Route::post('/addKeyboard',[KeyboardController::class,"add"]);

//---------temporary routes end