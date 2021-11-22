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

Route::get('/', 'IndexController@index')->name('home');
Route::get('/products','ItemController@index');
Route::get('/category/{id}','ItemController@item');
Route::get('/product/{id}','ItemController@single');
Route::get('/about','AboutController@index');
Route::get('/contact', 'IndexController@contact')->name('contact');
Route::post('/contact', 'IndexController@sendContact');



// Admin Routes

Route::namespace("Admin")->prefix('admin')->group(function(){
   Route::get('/', 'HomeController@index')->name('admin.home');

    // Admin Slider
    Route::get('/slider','SliderController@admin');
    Route::get('/slider/add','SliderController@create');
    Route::post('/slider/store','SliderController@store')->name('admin.slider.store');
    Route::get('/slider/edit/{id}','SliderController@edit');
    Route::post('/slider/update/{id}','SliderController@update')->name('admin.slider.update');
    Route::delete('/slider/delete/{id}','SliderController@destroy');

    //Admin Category 
    Route::get('/categories','CategoryController@admin');
    Route::get('/category/add','CategoryController@create');
    Route::post('/category/store','CategoryController@store')->name('admin.category.store');
    Route::get('/category/edit/{id}','CategoryController@edit');
    Route::post('/category/update/{id}','CategoryController@update')->name('admin.category.update');
    Route::delete('/category/delete/{id}','CategoryController@destroy');

    //Admin Brand 
    Route::get('/brands','BrandController@admin');
    Route::get('/brand/add','BrandController@create');
    Route::post('/brand/store','BrandController@store')->name('admin.brand.store');
    Route::get('/brand/edit/{id}','BrandController@edit');
    Route::post('/brand/update/{id}','BrandController@update')->name('admin.brand.update');
    Route::delete('/brand/delete/{id}','BrandController@destroy');

    
    //Admin Item 
    Route::get('/items','ItemController@admin');
    Route::get('/item/add','ItemController@create');
    Route::post('/item/store','ItemController@store')->name('admin.item.store');
    Route::get('/item/edit/{id}','ItemController@edit');
    Route::post('/item/update/{id}','ItemController@update')->name('admin.item.update');
    Route::delete('/item/img/delete/{id}','ItemController@imagedelete');
    Route::get('/category/item/{id}','ItemController@show');
    Route::delete('/item/delete/{id}','ItemController@destroy');


    // Admin About us
    Route::get('/about','AboutController@show');
    Route::post('/about/update','AboutController@update')->name('admin.about.update');

	Route::namespace('Auth')->group(function(){
		Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'LoginController@login');
		Route::post('logout', 'LoginController@logout')->name('admin.logout');
	});
});
// Route::get('/admin','AdminController@create');
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


