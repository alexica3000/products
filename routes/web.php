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

Route::get('/', 'ProductController@index');

Auth::routes();

Route::resource('/category', 'CategoryController');
Route::resource('/product', 'ProductController');
Route::get('/cat/{category}/', 'ProductController@productCat')->name('cat.product');

Route::get('/home', 'ProductController@index')->name('home');
