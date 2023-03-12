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
Route::get('/', 'App\Http\Controllers\MainController@index');
Route::get('/shop', 'App\Http\Controllers\MainController@shop');
Route::get('/categories', 'App\Http\Controllers\MainController@categories');
Route::get('/covers/{product?}', 'App\Http\Controllers\MainController@product');
Route::get('/checkout', 'App\Http\Controllers\MainController@checkout');
Route::get('/{category}', 'App\Http\Controllers\MainController@category');

