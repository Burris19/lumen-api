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
        Rutas para Pasillos
    */
    $router->get('hallways', 'HallwaysController@index');
    $router->get('hallways/{id}', 'HallwaysController@show');
    $router->post('hallways', 'HallwaysController@store');
    $router->put('hallways/{id}', 'HallwaysController@update');
    $router->delete('hallways/{id}', 'HallwaysController@delete');

    /*
        Rutas para Estanterias
    */
    $router->get('shelves', 'ShelvesController@index');
    $router->get('shelves/{id}', 'ShelvesController@show');
    $router->post('shelves', 'ShelvesController@store');
    $router->put('shelves/{id}', 'ShelvesController@update');
    $router->delete('shelves/{id}', 'ShelvesController@delete');

    /*
        Rutas para Categorias
    */
    $router->get('categories', 'CategoriesController@index');
    $router->get('categories/{id}', 'CategoriesController@show');
    $router->post('categories', 'CategoriesController@store');
    $router->put('categories/{id}', 'CategoriesController@update');
    $router->delete('categories/{id}', 'CategoriesController@delete');

    /*
        Rutas para Productos
    */
    $router->get('products', 'ProductsController@index');
    $router->get('products/cellar', 'ProductsController@productsWithRelationship');
    $router->get('products/cellar/{id}', 'ProductsController@productsByCellar');

    /**
     * Buscar producto por codigo o nombre
     */
    $router->post('product/search', 'ProductsController@SearchProduct');

    /*
        Rutas para Cardex
    */
    $router->post('cardex/product', 'CardexController@store');

    $router->get('hallways/cellar/{id}', 'HallwaysController@getHallwaysCellar');
    $router->get('shelves/hall/{id}', 'ShelvesController@getShelvesHall');
});
