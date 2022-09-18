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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/categories', 'Api\RestaurantController@categories')->name('api.restaurants.categories');
Route::get('/category/restaurants', 'Api\RestaurantController@restaurants')->name('api.restaurants.restaurants');
Route::get('/category/restaurants/{restaurant}', 'Api\RestaurantController@show')->name('api.restaurants.show');



// route per Braintree
Route::get('/orders/generate', 'Api\Orders\OrderController@generate')->name('api.orders.generateToken'); // genera un token
Route::post('/orders/make/payment', 'Api\Orders\OrderController@makePayment')->name('api.orders.makePayment'); // genera il pagamento

// rotte per i piatti
Route::get('/plates', 'Api\Plate\PlateController@index');
