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
$router->get('/lesson4/direct', 'Lesson4Controller@direct');
$router->get('/lesson4/response', 'Lesson4Controller@response');
$router->get('/lesson4/json', 'Lesson4Controller@json');
$router->get('/lesson4/closure', function () {
    return 'This is closure';
});
