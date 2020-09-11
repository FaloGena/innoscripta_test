<?php

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

Route::get('/', "HomeController@index");


Route::group(['middleware' => ['guest']], function () {
    // Authorisation routes
    Route::get('register', "Auth\RegistrationController@show")->name('register');
    Route::post('register', "Auth\RegistrationController@register");
    Route::post('login', 'Auth\LoginController@authenticate');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('profile', "UserController@index");
    Route::post('profile', "AddressController@create");
});

Route::post('currency', "CurrencyController@change");

Route::get('cart', "CartController@index");
Route::post('cart', "CartController@changeCartAmount");

Route::get('checkout', "CheckoutController@index");
Route::post('checkout', "CheckoutController@save");
