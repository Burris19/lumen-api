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
$router->group(['prefix' => 'apiv1'], function () use ($router) {
    /*
        Rutas para bodegas
    */
    $router->get('wineries', 'WineriesController@index');
    $router->get('wineries/{id}', 'WineriesController@show');
    $router->post('wineries', 'WineriesController@store');
    $router->put('wineries/{id}', 'WineriesController@update');
    $router->delete('wineries/{id}', 'WineriesController@delete');


    /*
        Rutas para Pisos
    */
    $router->get('hallways', 'HallwaysController@index');
    $router->get('hallways/{id}', 'HallwaysController@show');
    $router->post('hallways', 'HallwaysController@store');
    $router->put('hallways/{id}', 'HallwaysController@update');
    $router->delete('hallways/{id}', 'HallwaysController@delete');
});
