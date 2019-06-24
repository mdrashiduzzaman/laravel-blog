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

Route::get('/', 'FrontendController@welcome')->name('welcome');
Route::get('product/{id}', 'FrontendController@product')->name('product');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::post('/contact/insert', 'FrontendController@contactinsert')->name('contactinsert');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact/message/view', 'HomeController@contactMessageView')->name('contactMessageView');

Route::get('Add/Product', 'ProductController@addProduct')->name('addProduct');
Route::post('add/product/insert', 'ProductController@productInsert')->name('productInsert');
Route::get('delete/product/{id}', 'ProductController@deleteProduct')->name('deleteProduct');
Route::get('edit/product/{id}', 'ProductController@editProduct')->name('editProduct');
Route::post('update/product/{id}', 'ProductController@updateProduct')->name('updateProduct');
Route::get('restore/product/{id}', 'ProductController@restoreProduct')->name('restoreProduct');
Route::get('forceDelete/product/{id}', 'ProductController@forceDeleteProduct')->name('forceDeleteProduct');


Route::get('Category/Product', 'CategoryController@categoryProduct')->name('categoryProduct');
Route::post('add/category', 'CategoryController@addCategory')->name('addCategory');
Route::get('menu/product/view/{id}','CategoryController@menuProduct')->name('menuProduct');