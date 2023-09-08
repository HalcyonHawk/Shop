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

Route::get('/', function () {
    return view('welcome');
});

//Not logged in

//View products
Route::resource('product', 'App\Http\Controllers\ProductController')->only('index', 'show');

//-----------------------------------------------------------------------------------------

//Routes only logged in users can access
Route::group(['middleware' => 'auth'], function () {
    //Create an order, and to view past orders
    Route::resource('order', 'App\Http\Controllers\OrderController')->except('destroy', 'edit', 'update');
    //Manage cart
    Route::resource('cart', 'App\Http\Controllers\CartController');
    //Add shipping details
    Route::resource('shipping_detail', 'App\Http\Controllers\ShippingDetailController');
    //Make payment
    Route::resource('payment', 'App\Http\Controllers\PaymentController');

});
//-----------------------------------------------------------------------------------------

Auth::routes();
