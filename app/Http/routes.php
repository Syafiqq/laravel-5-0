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


/** @var \Illuminate\Routing\Router $router */
$router->get('/', 'WelcomeController@index');
$router->get('/template/boilerplate', 'TemplateController@boilerplate');
$router->get('/template/bootstrap', 'TemplateController@bootstrap');
$router->get('/template/adminlte', 'TemplateController@adminlte');
$router->get('/template/semantic', 'TemplateController@semantic');
//Lesson 006
$router->group(['prefix' => 's01/e06'], function () use ($router) {
    $router->get('/songs', 'S01\E06\SongsController@songList');
    $router->get('/songs/{id}', 'S01\E06\SongsController@songGet')->where('id', '[0-9]+');
});
