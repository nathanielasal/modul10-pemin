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

$router->group(['prefix' => 'prodi'], function () use ($router) {
    $router->post('/', ['uses' => 'ProdiController@createProdi']);
    $router->get('/', ['uses' => 'ProdiController@getAllProdi']);
});

    $router->group(['prefix' => 'mahasiswa'], function () use ($router) {
    $router->post('/', ['uses' => 'MahasiswaController@createMahasiswa']);
    $router->get('/', ['uses' => 'MahasiswaController@getAllMahasiswa']);
    $router->get('/profile', ['uses' => 'MahasiswaController@getMahasiswaByToken']);
});