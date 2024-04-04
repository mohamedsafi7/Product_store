<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Login Routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/admin',function(){
    return view('admin');
})->name('admin');

// Registration Routes
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
// Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/logout', [UserController::class, 'logoutUser'])->middleware('auth')->name('logout');
//product
Route::get('/',[ProductController::class,'get'])->name('getProduct');
Route::get('/createProd',[ProductController::class,'create'])->name('createProd');
Route::get('/product/{id}',[ProductController::class,'show'])->name('show');
Route::post('/addprod',[ProductController::class,'add'])->name('addProd');
Route::post('/cart/{id}', [ProductController::class, 'addtocart'])->name('addtocart');


//item
Route::get('/item',[ItemController::class,'get'])->name('getItem');
Route::get('/createitem',[ItemController::class,'create'])->name('createItem');
Route::get('/Item/{id}',[ItemController::class,'show'])->name('showItem');
Route::get('/cart/{id}',[ProductController::class,'addtocart'])->name('addtocart');
Route::post('/additem',[ItemController::class,'add'])->name('addItem');

//order
Route::get('/order',[OrderController::class,'get'])->name('getOrder');
