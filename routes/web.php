<?php

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
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

//Route::get('/cart', function () {
//    return view('cart');
//});

Route::resource('products','ProductController');
Route::resource('home','HomeController');

Route::get('/product/{id}', [
    'uses' => 'HomeController@singleProduct',
    'as' =>'products.singleProduct'
]);

Route::post('/cart/add','CartController@addToCart')->name('cart.add');

Route::get('/cart', 'CartController@cart')->name('cart');

Route::get('/cart/delete/{id}', 'CartController@cartDelete')->name('cart.delete');

Route::get('/cart/minus/{id}/{qty}', 'CartController@cartMinus')->name('cart.minus');

Route::get('/cart/plus/{id}/{qty}', 'CartController@cartPlus')->name('cart.plus');

Route::post('/cart/checkout', 'CartController@cartCheckout')->name('cart.checkout');
