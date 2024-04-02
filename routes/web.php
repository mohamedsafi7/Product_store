<?php

use App\Http\Controllers\ProductController;
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

Route::get('/',[ProductController::class,'get'])->name('getProduct');
Route::get('/createProd',[ProductController::class,'create'])->name('createProd');
Route::get('/product/{id}',[ProductController::class,'show'])->name('show');
Route::post('/add',[ProductController::class,'add'])->name('addProd');

