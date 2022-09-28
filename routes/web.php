<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();




Route::middleware('auth')
   ->namespace('Restaurant')
   ->name('restaurant.')
   ->prefix('restaurant')
   ->group(function () {
    Route::get('/', 'RestaurantController@dashboard')->name('dashboard');
    Route::resource('plates', 'PlateController');
   });

Route::get("{any?}", function() {
    return view("guests.home");
})->where("any", ".*")->name('home');
