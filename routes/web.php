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

$router->group(['prefix' => 'auth'], function () use ($router){
    $router->post('/register','AuthController@register');
    $router->post('/login','AuthController@login');
});

$router->group(['middleware' => ['auth']], function () use ($router) {
    $router->get('Pengarang', 'PengarangController@index');
    $router->post('Pengarang','PengarangController@store');
    $router->get('Pengarang/{id}', 'PengarangController@show');
    $router->put('Pengarang/{id}','PengarangController@update');
    $router->delete('Pengarang/{id}','PengarangController@destroy');
});

$router->group(['middleware' => ['auth']], function () use ($router) {
    $router->get('Buku', 'BukuController@index');
    $router->post('Buku','BukuController@store');
    $router->get('Buku/{id}', 'BukuController@show');
    $router->put('Buku/{id}','BukuController@update');
    $router->delete('Buku/{id}','BukuController@destroy');
});