<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/get-data-filter', 'Case7Controller@getDataFilter');

$router->post('/api/register-tes', 'Case6Controller@getHandleResponse');
$router->post('/api/login-tes', 'Case6Controller@getHandleResponseLogin');
