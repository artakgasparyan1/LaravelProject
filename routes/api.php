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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*auth user*/
/*
Route::post('/user-login', 'ApiController@login');*/

Route::post('/user-registration', 'ApiController@create');

/*news**/
Route::get('/news', 'ApiController@index');
Route::post('/store', 'ApiController@store');
Route::get('/show/{id}', 'ApiController@show');
Route::post('/update', 'ApiController@update');
Route::get('/destroy/{id}', 'ApiController@destroy');




