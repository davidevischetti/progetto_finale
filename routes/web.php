<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Middleware;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')
   ->namespace('Restaurant')
   ->name('restaurant.')
   ->prefix('restaurant')
   ->group(function () {
    Route::get('/restaurant', 'RestaurantController@dashboard')->name('dashboard');
   });
