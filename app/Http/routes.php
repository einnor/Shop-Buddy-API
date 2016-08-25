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
$api->version('v1', ['middleware'=>'cors'], function ($api) {
    $api->get('/', function() {
        return ['Buddy' => 'Success! API calls work'];
    });

    /**
     * Authentication
     */
    $api->post('/user/authenticate', 'App\Http\Controllers\Auth\AuthController@authenticate');
    $api->post('/authenticated/user', 'App\Http\Controllers\Auth\AuthController@showUser');
    $api->post('/token/refresh', 'App\Http\Controllers\Auth\AuthController@refreshToken');

    /**
     * Users
     */
    $api->get('/users', 'App\Http\Controllers\UsersController@getAllUsers');
    $api->post('/users', 'App\Http\Controllers\Auth\AuthController@registerUser');
    $api->get('/users/{id}', 'App\Http\Controllers\UsersController@getUserById');
    $api->put('/users/{id}', 'App\Http\Controllers\UsersController@updateUserById');
    $api->delete('/users/{id}', 'App\Http\Controllers\UsersController@deleteUser');

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
    $api->put('/carts/{id}', 'App\Http\Controllers\CartsController@updateCartById');
    $api->delete('/carts/{id}', 'App\Http\Controllers\CartsController@deleteCartById');

    /**
     * Checkout
     */
    $api->post('/carts', 'App\Http\Controllers\CheckoutController@checkout');
    $api->post('/products/attributes', 'App\Http\Controllers\CheckoutController@getAmazonProductAttributes');

    /**
     * Products
     */
    $api->get('/products', 'App\Http\Controllers\ProductsController@getAllProducts');
    $api->get('/carts/{id}/products', 'App\Http\Controllers\ProductsController@getAllProductsByCartId');
    $api->get('/products/{id}', 'App\Http\Controllers\ProductsController@getProductById');
    $api->put('/products/{id}', 'App\Http\Controllers\ProductsController@updateProductById');
    $api->delete('/products/{id}', 'App\Http\Controllers\ProductsController@deleteProductById');
});
