<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/profile/orders', 'App\Http\Controllers\YourOrderController@index')->name('orders');
//Route::get('/orders', 'App\Http\Controllers\Admin\OrderController@orders')->middleware(['auth', 'verified', 'is_admin'])->name('dashboard');
//Route::get('/admin-categories', 'App\Http\Controllers\Admin\CategoryController@categories')->middleware(['auth', 'verified', 'is_admin'])->name('admin-categories');
Route::group([
    'prefix'=>'admin',
    'middleware'=>['auth', 'verified', 'is_admin']
],function (){
    Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('products', 'App\Http\Controllers\Admin\ProductController');
    Route::get('/orders', 'App\Http\Controllers\Admin\OrderController@orders')->name('dashboard');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
//Route::get('/home', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/categories', 'App\Http\Controllers\MainController@categories')->name('categories');
Route::get('/shop', 'App\Http\Controllers\MainController@shop')->name('shop');
Route::group([
    'prefix' => 'basket'], function (){
    Route::post('/add/{id}', 'App\Http\Controllers\BasketController@basketAdd')->name('basket-add');
    Route::group([
        'middleware' => 'basket_is_not_empty'
    ], function () {
        Route::get('/', 'App\Http\Controllers\BasketController@basket')->name('basket');
        Route::get('/order', 'App\Http\Controllers\BasketController@basketPlace')->name('order');
        Route::post('/confirm', 'App\Http\Controllers\BasketController@orderConfirm')->name('order-confirm');
        Route::post('/remove/{id}', 'App\Http\Controllers\BasketController@basketRemove')->name('basket-remove');
    });
});
Route::get('/{category}', 'App\Http\Controllers\MainController@category')->name('category');
Route::get('/{category}/{product?}', 'App\Http\Controllers\MainController@product')->name('product');
