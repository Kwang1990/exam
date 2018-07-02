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
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/user','userController@index')->name('user.index');
// Route::get('/admin/user/{id}','userController@detail')->name('user.detail');
Route::get('/admin/user/create','userController@create')->name('user.create');
Route::post('/admin/user/create','userController@store')->name('user.store');
Route::get('/admin/user/{id}/edit','userController@edit')->name('user.edit');
Route::post('/admin/user/update','userController@update')->name('user.update');
Route::get('/admin/user/{id}/delete','userController@del')->name('user.del');
Route::get('/admin/category','CategoryController@index')->name('Category.index');
Route::get('/admin/category/{category_id}','CategoryController@detail')->name('Category.detail');
Route::get('/admin/product','ProductController@index')->name('product.index');
Route::get('/admin/product/{id_product}','ProductionController@detail')->name('product.detail');
