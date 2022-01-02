<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\MyCartController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\CheckCustomerRole;
use App\Http\Middleware\EnsureAuth;
use App\Http\Middleware\EnsureManager;
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

Route::middleware('guest')->group(function(){
    Route::get('/login',[AuthController::class,"login"])->name('login.index');
    Route::get('/register',[AuthController::class,"register"])->name('register.index');
    Route::post('/addUser',[AuthController::class,"addUser"])->name('register');
    Route::post('/doLogin',[AuthController::class,"doLogin"])->name('login');
});

Route::get('/logout', [AuthController::class,"logout"])->middleware('auth')->name('logout');

Route::middleware(EnsureAuth::class)->group(function(){
    Route::get('/changePassword',[AuthController::class,"viewChangePassword"])->name('change-pass.index');
    Route::post('/changePassword',[AuthController::class,"changePassword"])->name('change-pass');

    Route::get('/myCart',[MyCartController::class,'index'])->name('cart-index');
    Route::post('/addtocart', [MyCartController::class,'insert'])->name('add-to-cart');
});

Route::middleware(CheckCustomerRole::class)->group(function(){
    Route::post('/updateTransaction',[MyCartController::class,"addTransaction"])->name('add-transaction');
    Route::post('/updateCart',[MyCartController::class,"updateCart"])->name('update-cart');
    Route::get('/myTransaction',[TransactionController::class,'getTransaction'])->name('my-transaction');
    
    Route::get('/viewTransaction/detail/{id}',[TransactionController::class,'getDetailTransaction'])->name('transaction-detail');
});

Route::get('/home', [HomeController::class,'index'])->name('home');

Route::get('/categories/{id}',[CategoryController::class,"index"])->name('keyboards_by_category');

Route::get('/keyboards/{id}',[KeyboardController::class,"index"])->name('keyboard-detail');

Route::middleware(EnsureManager::class)->group(function(){
    Route::get('/manage', [CategoryController::class,"manage"])->name('category.manage');
    Route::get('/categories/{id}/edit',[CategoryController::class,"updateIndex"])->name('category.update.index');
    Route::post('/updateCategory',[CategoryController::class,"update"])->name('category.update');
    Route::get('/add-category',[CategoryController::class,"viewAddCategory"])->name('category.add.index');
    Route::post('/addCategory',[CategoryController::class,"addCategory"])->name('category.add');
    Route::post('/deleteCategory',[CategoryController::class,"delete"])->name('category.delete');
    
    Route::get('/add-keyboard',[KeyboardController::class,"addIndex"])->name('keyboard.add.index');
    Route::post('/addKeyboard',[KeyboardController::class,"add"])->name('keyboard.add');
    Route::get('/update-keyboard/{id}',[KeyboardController::class,"updateIndex"])->name('keyboard.update.index');
    Route::post('/updateKeyboard',[KeyboardController::class,"update"])->name('keyboard.update');
    Route::post('/deleteKeyboard',[KeyboardController::class,"delete"])->name('keyboard.delete');
});

Route::get('/categories/{id}/search',[KeyboardController::class,"search"])->name('search');