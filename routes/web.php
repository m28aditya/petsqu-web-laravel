<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\DashboardController as adminDashboard;
use App\Http\Controllers\Admin\ProductController as adminProduct;
use App\Http\Controllers\Admin\OrderController as adminOrder;
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

Route::get('/auth/sign-up',[AuthController::class,'signup']);
Route::post('/auth/sign-up',[AuthController::class,'register']);
Route::get('/auth/sign-in',[AuthController::class,'signin'])->name('login');
Route::post('/auth/sign-in',[AuthController::class,'authenticate']);
Route::post('/auth/sign-out',[AuthController::class,'logout']);


// HomeController
Route::get('/', [HomeController::class, 'index']);
Route::get('/product', [HomeController::class, 'product']);
Route::get('/product/category/dog', [HomeController::class, 'Dogcategory']);
Route::get('/product/category/cat', [HomeController::class, 'Catcategory']);
Route::post('/search',[HomeController::class,'search']);
Route::get('/product/{slug}/detail', [TransactionController::class, 'order']);

Route::middleware(['auth'])->group(function () {
    Route::post('/product/{slug}/add',[TransactionController::class, 'addToCart']);
    Route::get('/user/cart',[CartController::class,'index']);
    Route::post('/user/cart/{id}/delete',[CartController::class,'destroy']);
    Route::post('/user/cart/{id}/confirm',[CartController::class,'confirmOrder']);
    Route::get('/user/history',[TransactionController::class,'orderHistory']);
    Route::get('/user/history/{id}/detail',[TransactionController::class,'orderHistoryDetail']);
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [adminDashboard::class,'index']);
    
    Route::get('/admin/product/dog', [adminProduct::class, 'indexDog']);
    Route::get('/admin/product/cat', [adminProduct::class, 'indexCat']);
    Route::get('/admin/product/create', [adminProduct::class, 'create']);
    Route::post('/admin/product/create', [adminProduct::class, 'store']);
    Route::get('/admin/product/{slug}/detail',[adminProduct::class, 'show']);
    Route::get('/admin/product/{slug}/edit',[adminProduct::class, 'edit']);
    Route::put('/admin/product/{slug}/edit',[adminProduct::class, 'update']);
    Route::delete('/admin/{id}/delete',[adminProduct::class, 'destroy']);

    Route::get('/admin/order',[adminOrder::class,'index']);
    Route::get('/admin/order/{id}/detail',[adminOrder::class,'orderDetail']);
    Route::post('/admin/order/{id}/confirm',[adminOrder::class,'orderConfirm']);
});