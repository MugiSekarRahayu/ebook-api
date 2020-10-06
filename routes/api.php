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


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');
    Route::post('logout', 'UserController@logout');
    Route::post('refresh', 'UserController@refresh');
    Route::get('user-profile', 'UserController@userProfile');
});


/*Route::get('books', 'BookController@index');//show/read all data
Route::post('books', 'BookController@store');//create new data
Route::get('books/{id}', 'BookController@show');//show/read data by id(detail data)
Route::put('books/{id}', 'BookController@update');//update data
Route::delete('books/{id}', 'BookController@destroy');//delete data*/

Route::resource('books','BookController');
Route::resource('authors','AuthorController');
//Route::resource('users', 'UserController');