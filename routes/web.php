<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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


Route::get('/home', [HomeController::class,'index']);

Route::get('/categories/{name}',[CategoryController::class,"manage"]);
Route::get('/categories/manage', [CategoryController::class,"index"]);

//---------temporary routes end