<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('home');
});
Route::get('/login',[AuthController::class,"login"]);
Route::get('/register',[AuthController::class,"register"]);
Route::post('/addUser',[AuthController::class,"addUser"]);
Route::post('/doLogin',[AuthController::class,"doLogin"]);
//----------temporary routes


Route::get('/home', function () {
    
    return view('home');
});

Route::get('/view-keyboard', function () {
    return view('view_keyboard');
});

Route::get('/manage-categories', function () {
    return view('manage_categories');
});

//---------temporary routes end