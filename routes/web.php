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

$router->group(['prefix' => 'auth'], function () use ($router) { // dikerjakan oleh Shafa Nathaniela Salwa
    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');
});

$router->get('/mahasiswa', 'MahasiswaController@getAllMahasiswa'); // dikerjakan oleh Shafa Nathaniela Salwa

$router->get('/prodi', 'ProdiController@getAllProdi'); //-- dikerjakan oleh Ranatika Putri Aulia

$router->group(['middleware' => 'auth'], function () use ($router) { // dikerjakan oleh Dzakiyyah Afifah Rahma
    $router->get('/mahasiswa/profile', 'MahasiswaController@getMahasiswaByToken');
});