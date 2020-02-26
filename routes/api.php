<?php

use Illuminate\Http\Request;

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

Route::prefix('v1')->middleware('api')->group(function () {
    Route::post('login', 'API\v1\PassportController@login');
    Route::post('register', 'API\v1\PassportController@register');
});

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::resource('items', 'API\v1\ItemController')->except([
        'create', 'edit'
    ]);

    Route::resource('lists', 'API\v1\ListController')->except([
        'create', 'edit'
    ]);

    Route::resource('stores', 'API\v1\StoreController')->except([
        'create', 'edit', 'destroy'
    ]);

    Route::get('user', 'API\v1\PassportController@user');
    Route::get('logout', 'API\v1\PassportController@logout');
});
