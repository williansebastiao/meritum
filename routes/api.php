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

Route::group(['prefix' => 'register'], function(){
    Route::post('/', [\App\Http\Controllers\Api\AuthController::class, 'register']);
    Route::group(['middleware' => 'jwt.verify'], function() {
        Route::get('me', [\App\Http\Controllers\Api\UserController::class, 'me']);
        Route::post('logout', [\App\Http\Controllers\Api\UserController::class, 'logout']);
    });
});
