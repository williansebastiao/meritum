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

Route::group(['prefix' => 'register'], function() {
    Route::post('/', [\App\Http\Controllers\Api\AuthController::class, 'register']);
});

Route::group(['prefix' => 'authenticate'], function() {
    Route::post('/', [\App\Http\Controllers\Api\AuthController::class, 'authenticate']);
});


Route::group(['middleware' => 'jwt.verify'], function() {
    Route::group(['prefix' => 'user'], function() {
        Route::get('me', [\App\Http\Controllers\Api\AuthController::class, 'me']);
    });
});
