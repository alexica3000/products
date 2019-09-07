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

// Route::resource('/{category}/subcat', 'SubCategoryController');

// Route::resource('/subcat', 'CategoryController');

Route::get('/home', 'CategoryController@index')->name('home');
