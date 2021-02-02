<?php

use \Illuminate\Support\Str;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function (){
    return Str::random(32);
});



$router->group(['prefix'=> 'api'], function () use ($router){
    $router->get('/product', 'ProductController@index');
    $router->get('/product/{id}', 'ProductController@getId');
    $router->post('/product', 'ProductController@store');
    $router->put('/product/{id}', 'ProductController@update');
    $router->delete('/product/{id}', 'ProductController@destroy');
});
