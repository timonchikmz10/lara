<?php

use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Info\AboutController;
use App\Http\Controllers\Info\ContactController;
use App\Http\Controllers\Info\PolicyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Person\OrdersController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\CommentController;
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
Route::get('/reset', [ResetController::class, 'reset'])->name('reset');
Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/policy', [PolicyController::class, 'index'])->name('policy');
Route::middleware('auth')->group(function () {
    Route::group([
        'prefix'=> 'person',
        'namespace'=>'Person',
        'middleware'=>['verified'],
    ], function (){
        Route::get('/orders', [OrdersController::class, 'orders'])->name('profile-orders');
        Route::get('/orders/{order}', [OrdersController::class, 'show'])->name('profile-order-show');
    });
    Route::group([
        'prefix'=>'admin',
        'middleware'=>['verified', 'is_admin']
    ],function (){
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('properties', PropertyController::class);
        Route::resource('info', InfoController::class);
        Route::get('/orders', [OrderController::class, 'orders'])->name('dashboard');
        Route::get('/orders/{order}', [OrderController::class, 'show'])->name('order-show');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//    Rute::get('', )
});
require __DIR__ . '/auth.php';
Route::get('/subscription/{product}', [MainController::class, 'subscribe'])->name('subscription');
Route::post('/comment/{product}', [CommentController::class, 'index'])->name('comment');
Route::post('/comment/update/{product}', [CommentController::class, 'update'])->name('comment-update');
Route::get('/shop', [MainController::class, 'shop'])->name('shop');
Route::group([
    'prefix' => 'basket'], function (){
    Route::post('/add/{product}', [BasketController::class, 'basketAdd'])->name('basket-add');
    Route::group([
        'middleware' => 'basket_is_not_empty'
    ], function () {
        Route::get('/', [BasketController::class, 'basket'])->name('basket');
        Route::middleware('auth')->group(function (){
            Route::get('/order', [BasketController::class, 'basketPlace'])->name('order');
            Route::post('/city', [BasketController::class, 'orderCity'])->name('city');
            Route::get('/warehouse/{city}/{cityTitle}', [BasketController::class, 'orderWarehouse'])->name('warehouse');
            Route::get('/order/info/{city}/{cityTitle}/{warehouseTitle}', [BasketController::class, 'orderInfo'])->name('order-info');
            Route::post('/order/confirm/{cityTitle}/{warehouseTitle}/{cost}', [BasketController::class, 'orderConfirm'])->name('order-confirm');
        });
//        Route::post('/confirm', [BasketController::class, 'orderConfirm'])->name('payment-confirm');
        Route::post('/remove/{product}', [BasketController::class, 'basketRemove'])->name('basket-remove');
    });
});
Route::get('/{category}', [MainController::class, 'category'])->name('category');
Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');

