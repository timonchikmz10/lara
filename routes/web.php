<?php

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
//Route::get('/', 'App\Http\Controllers\MainController@index');
//Route::get('/shop', 'App\Http\Controllers\MainController@shop');
//Route::get('/product/{product?}', 'App\Http\Controllers\MainController@product');
Route::get('/{category}/{product?}', 'App\Http\Controllers\MainController@test');
