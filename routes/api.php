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


Route::post('auth/login', 'App\Http\Controllers\Api\AuthController@login')->name('auth.login');
Route::post('auth/register', 'App\Http\Controllers\Api\AuthController@register')->name('auth.login');


Route::group(['middleware' => ['apiJwt']], function () {

    Route::group([
        'prefix' => 'auth',
        'namespace' => 'App\Http\Controllers\Api'
    ], function () {
        Route::post('logout', 'AuthController@logout')->name('auth.logout');
        Route::post('refresh', 'AuthController@refresh')->name('auth.refresh');
        Route::get('user-profile', 'AuthController@userProfile')->name('auth.userProfile');
    });

    Route::group([
        'prefix' => 'invoice',
        'namespace' => 'App\Http\Controllers\api'
    ], function () {
        Route::get('view', 'InvoiceController@index')->name('invoice.view');
        Route::get('view/{id}', 'InvoiceController@show')->name('invoice.viewId');
        Route::post('create', 'InvoiceController@store')->name('invoice.create');
        Route::put('edit/{id}', 'InvoiceController@update')->name('invoice.edit');
        Route::delete('delete/{id}', 'InvoiceController@destroy')->name('invoice.delete');
    });


    Route::any('{any}', function () {
        return response()->json([
            'status' => false,
            'message' => 'Page Not Found.',
        ], 404);
    })->where('any', '.*');

});


