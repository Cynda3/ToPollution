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

Route::get('dataValues', 'ApiMeassurement@minMax');  // Return an array of min and max values of every data
Route::apiResource('device', 'ApiMeassurement');

Route::apiResource('user', 'ApiUser');
Route::get('device/{id}/{fecha}', 'ApiMeassurement@dia'); 
Route::get('device/{id}/{fecha}/decibelios', 'ApiMeassurement@dB'); 
//Route::get('device/{id}/{tipo}/{fecha}', 'ApiMeassurement@dia');
