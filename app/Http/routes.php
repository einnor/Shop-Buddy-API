








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

// Route::get('/', function () {
//     return view('welcome');
// });

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('/', function() {
        return ['Buddy' => 'Success! API calls work'];
    });

    //Authentication
    $api->post('/user/authenticate', 'App\Http\Controllers\Auth\AuthController@authenticate');
    $api->post('/user/register', 'App\Http\Controllers\Auth\AuthController@registerUser');
    $api->post('/user', 'App\Http\Controllers\Auth\AuthController@showUser');
    $api->post('/token/refresh', 'App\Http\Controllers\Auth\AuthController@refreshToken');

    //Checkout
    $api->post('/products/attributes', 'App\Http\Controllers\CheckoutController@getAmazonProductAttributes');
    $api->post('/user/checkout', 'App\Http\Controllers\CheckoutController@checkout');

    // Pesapal IPN Listener
    $api->post('/pesapal/ipn/listener', 'App\Http\Controllers\CheckoutController@listen');
});
