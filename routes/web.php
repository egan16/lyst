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

Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('/about', 'PageController@about')->name('about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/user/home', 'User\HomeController@index')->name('user.home');

//CRUD routes for user
//User lists crud
Route::get('/user/lists', 'User\ListController@index')->name('user.lists.index');
Route::get('/user/lists/create', 'User\ListController@create')->name('user.lists.create');
Route::get('/user/lists/{id}', 'User\ListController@show')->name('user.lists.show');
Route::post('/user/lists/store', 'User\ListController@store')->name('user.lists.store');
Route::get('/user/lists/{id}/edit', 'User\ListController@edit')->name('user.lists.edit');
Route::put('/user/lists/{id}', 'User\ListController@update')->name('user.lists.update');
Route::delete('/user/lists/{id}', 'User\ListController@destroy')->name('user.lists.destroy');


//make productlist controller
//make show for this
Route::delete('/user/lists/{id}/items/{id}', 'User\ItemController@destroy')->name('user.items.destroy');



//products crud
Route::get('/user/items', 'User\ItemController@index')->name('user.items.index');


Route::get('/user/lists/{id}/items/create', 'User\ItemController@create')->name('user.lists.items.create');
Route::post('/user/lists/{id}/items/store', 'User\ItemController@store')->name('user.lists.items.store');
Route::get('/user/items/{id}', 'User\ItemController@show')->name('user.items.show');
Route::delete('/user/items/{id}', 'User\ItemController@destroy')->name('user.items.destroy');
