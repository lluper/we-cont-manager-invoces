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


Route::post('auth/login', 'App\Http\Controllers\Api\AuthController@login');
Route::post('auth/register', 'App\Http\Controllers\Api\AuthController@register');


Route::group(['middleware'=> ['apiJwt']], function(){

    Route::group([
        'prefix' => 'auth',
        'namespace' => 'App\Http\Controllers\Api'
    ], function(){
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::get('user-profile', 'AuthController@userProfile');
    });

    Route::group([
        'prefix' => 'invoice',
        'namespace' => 'App\Http\Controllers\api'
    ], function(){
        Route::get('view',   'InvoiceController@index' );
        Route::get('view/{id}',   'InvoiceController@show' );
        Route::post('create',   'InvoiceController@store' );
        Route::put('edit/{id}',   'InvoiceController@update' );
        Route::delete('delete/{id}',   'InvoiceController@destroy' );
    });






});


