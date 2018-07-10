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
// Đăng nhập và xử lý đăng nhập
Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);
 
// Đăng xuất
Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\LogoutController@getLogout']);
//
Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/login', function () {
    return view('auth.login');
});
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//User
Route::get('/admin/user','UserController@index')->name('user.index');
Route::get('/admin/getUsers','UserController@getUsers');
Route::get('/admin/user/create','UserController@create')->name('user.create');
Route::post('/admin/user/create','UserController@store')->name('user.store');
Route::get('/admin/user/{id}/edit','UserController@edit')->name('user.edit');
Route::post('/admin/user/update','UserController@update')->name('user.update');
Route::get('/admin/user/{id}/delete','UserController@del')->name('user.del');
//Category
Route::get('/admin/category','CategoryController@index')->name('Category.index');
Route::get('/admin/category/create','CategoryController@create')->name('category.create');
Route::post('/admin/category/create','CategoryController@store')->name('category.store');
Route::get('/admin/category/{category_id}/edit','CategoryController@edit')->name('category.edit');
Route::post('/admin/category/update','CategoryController@update')->name('category.update');
Route::get('/admin/category/{category_id}/delete','CategoryController@del')->name('category.delete');
//product
Route::get('/admin/product','ProductController@index')->name('product.index');
Route::get('/admin/product/create','ProductController@create')->name('product.create');
Route::post('/admin/product/create','ProductController@store')->name('product.store');
Route::get('/admin/product/{id_product}/edit','ProductController@edit')->name('product.edit');
Route::post('/admin/product/update','ProductController@update')->name('product.update');
Route::get('/admin/product/{id_product}/delete','ProductController@del')->name('product.delete');
//admin nè