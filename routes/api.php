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

Route::post('/products', 'Api\RestaurantController@index');
Route::post('/products/plate', 'Api\PlateController@show');
Route::get('/generate', 'Api\PaymentController@generate');
// Route::post('/post/{slug}', 'Api\PostController@show')->middleware('api_token_check');