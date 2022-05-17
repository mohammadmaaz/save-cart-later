<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Customer\CustomerCartController;

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
    // return view('welcome');
    echo 'Save cart later is enabled';
});

Route::get('ajaxRequest', [AjaxController::class, 'ajaxRequest']);
Route::post('ajaxRequest', [AjaxController::class, 'ajaxRequestPost'])->name('ajaxRequest.post');

Route::post('savecart', [CartController::class, 'manage'])->name('manage.cart');
Route::get('cart/{id}', [CartController::class, 'get'])->name('get.cart');
Route::get('customers/{id}/carts', [CustomerCartController::class, 'get'])->name('get.customer.carts');