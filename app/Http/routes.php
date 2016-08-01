








<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 Route::get('/', function () {
     return view('welcome');
 });

Route::get('/apidoc', function() {
    return File::get(public_path() . '/apidoc/index.html');
});

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('/', function() {
        return ['Buddy' => 'Success! API calls work'];
    });

    /**
     * Authentication
     */
    $api->post('/user/authenticate', 'App\Http\Controllers\Auth\AuthController@authenticate');
    $api->post('/user/register', 'App\Http\Controllers\Auth\AuthController@registerUser');
    $api->post('/user', 'App\Http\Controllers\Auth\AuthController@showUser');
    $api->post('/token/refresh', 'App\Http\Controllers\Auth\AuthController@refreshToken');

    /**
     * Checkout
     */
    $api->post('/products/attributes', 'App\Http\Controllers\CheckoutController@getAmazonProductAttributes');
    $api->post('/user/checkout', 'App\Http\Controllers\CheckoutController@checkout');

    /**
     * Pesapal IPN Listener
     */
    $api->post('/pesapal/ipn/listener', 'App\Http\Controllers\CheckoutController@listen');

    /**
     * Transaction History
     */
    $api->get('/users/transactions/{id}', 'App\Http\Controllers\CartsController@userTransactionHistory');

    /**
     * Shipment
     */
    $api->get('/carts/shipments/{cartId}', 'App\Http\Controllers\ShipmentsController@cartShipments');
    $api->get('/shipments/{id}', 'App\Http\Controllers\ShipmentsController@shipment');
    $api->put('/shipments/{id}', 'App\Http\Controllers\ShipmentsController@updateShipment');
    $api->delete('/shipments/{id}', 'App\Http\Controllers\ShipmentsController@deleteShipment');
    $api->post('carts/shipments/{cartId}', 'App\Http\Controllers\ShipmentsController@createShipment');

    /**
     * Carts
     */
    $api->get('/carts', 'App\Http\Controllers\CartsController@getAllCarts');
    $api->get('/carts/{id}', 'App\Http\Controllers\CartsController@getCartById');
});
