<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ShopController@index');
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('shop/register','ShopController@create');
Route::post('shop/register','ShopController@store');

// Advertise routes...
Route::get('add/advertisement','ShopController@getAdvertise');
Route::post('add/advertisement','ShopController@postAdvertise');
Route::get('admin/approve/advertisement','ShopController@approveAdvertisement');
Route::post('admin/approve/advertisement','ShopController@approvedAdvertisement');


//Offer routes...
Route::get('add/offer','ShopController@getOffer');
Route::post('add/offer','ShopController@postOffer');
Route::get('offer/{id}','ShopController@showOffer');


// Add Shop route...
Route::get('add-shop','ShopController@getShop');
Route::post('add-shop','ShopController@postShop');

//Manage Shop route
Route::get('manage-shop','ShopController@manageShop');
Route::get('deleted-shops','ShopController@deletedShops');

Route::get('shops/{id}','ShopController@show');

Route::post('sendMail','ShopController@sendMail');

Route::get('user-dashboard','ShopController@userDashboard');

Route::get('admin-panel','ShopController@adminDashboard');

Route::post('search','ShopController@search');

