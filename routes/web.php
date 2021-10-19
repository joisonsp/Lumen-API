<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('associado/listar', ['as' => 'associados', 'uses' => 'AssociadoController@todosAssociados']);
    $router->get('associado/{id}', ['as' => 'associados.usuarioPorId', 'uses' => 'AssociadoController@associadoPorId']);
    $router->post('associado/cadastro', ['as' => 'associados.cadastrarAssociado', 'uses' => 'AssociadoController@cadastrarAssociado']);
    });


