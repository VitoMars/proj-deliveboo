<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/* Rotta che gestisce la homepage visibile agli utenti */

Route::get('/', 'HomeController@index')->name('index');

// Rotte per il guest
Route::resource('/restaurants', 'RestaurantController');
Route::resource('/categories', 'CategoryController');

/* Serie di rotte che gestiscono il meccanismo di autenticazione */
Auth::routes();

/* Rotte per gli admin */
Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')
    ->group(function () {
        //pagina di atterraggio dopo il login (con il prefix, l'url è /admin)
        Route::get('/', 'HomeController@index')->name('index');
        Route::resource('/restaurants', 'RestaurantController');
        Route::resource('/categories', 'CategoryController');
        Route::resource('/plates', 'PlateController');
        Route::resource('/orders', 'OrderController');

        Route::get('/profile' , 'HomeController@profile')->name('profile');
        Route::post('/generate-token' , 'HomeController@generate-token')->name('generate-token');
    });

// Rotte vue
Route::middleware('auth')
    ->group(function () {
        Route::get('/profile' , 'HomeController@profile')->name('profile');
        Route::post('/generate-token' , 'HomeController@generate-token')->name('generate-token');
    });
