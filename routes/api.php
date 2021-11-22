<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', 'API\AuthApiController@register');
Route::post('login', 'API\AuthApiController@login');
Route::post('updateProfile/{id}', 'API\AuthApiController@updateProfile');

###### product ###### 
Route::get('allCategories', 'API\ProductController@allCategories');
Route::get('allTypes', 'API\ProductController@allTypes');
Route::get('allSize', 'API\ProductController@allSize');
Route::post('addItem', 'API\ProductController@addItem');
Route::get('itemCategory/{id}', 'API\ProductController@itemCategory');
Route::get('itemType/{id}', 'API\ProductController@itemType');
Route::get('itemSize/{id}', 'API\ProductController@itemSize');
Route::get('detailsitem/{id}', 'API\ProductController@detailsitem');
Route::post('updateitem/{id}', 'API\ProductController@updateitem');
Route::post('cart/{user_id}', 'API\ProductController@cart');
Route::post('see_all_order/{user_id}', 'API\ProductController@see_all_order');
Route::post('confirm_cart/{user}', 'API\ProductController@confirm_cart');
