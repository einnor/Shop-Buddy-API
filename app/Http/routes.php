<!--
@Author: Ronnie Nyaga <internone>
@Date:   2016-04-27T16:01:12+03:00
@Email:  ronnienyaga@gmail.com
@Last modified by:   internone
@Last modified time: 2016-07-04T19:55:22+03:00
-->



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
});
