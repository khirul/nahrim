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

Route::get('/locations', 'RainfallsController@location');
Route::get('/average', 'RainfallsController@average');
Route::post('/calc', 'RainfallsController@calculation');
Route::post('/simulation', 'RainfallsController@simulation');
Route::get('/coords', 'CoordinatesController@index');
Route::post('/show/', 'CoordinatesController@show');
Route::post('/logout', 'AccountController@logout')->middleware('auth:api');
Route::post('/new-calc', 'RainfallsController@newCalculation');

Route::get('/exports', 'DataController@export');
Route::post('/station', 'DataController@station_upload');
Route::post('/rain', 'DataController@rain_upload');