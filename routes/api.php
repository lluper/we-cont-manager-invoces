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


Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
Route::post('register', 'App\Http\Controllers\Api\AuthController@register');
Route::post('logout', 'App\Http\Controllers\Api\AuthController@logout');
Route::post('refresh', 'App\Http\Controllers\Api\AuthController@refresh');
Route::get('user-profile', 'App\Http\Controllers\Api\AuthController@userProfile');

Route::group(['middleware'=> ['apiJwt']], function(){
   Route::get('user', 'App\Http\Controllers\Api\UserController@index');
});


