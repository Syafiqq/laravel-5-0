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
/*Template*/
$router->get('/template/boilerplate', 'TemplateController@boilerplate');
$router->get('/template/bootstrap', 'TemplateController@bootstrap');
$router->get('/template/adminlte', 'TemplateController@adminlte');
$router->get('/template/semantic', 'TemplateController@semantic');
/*Lesson 5*/
$router->get('/lesson5/assoc', 'Lesson5Controller@assoc');
$router->get('/lesson5/compact', 'Lesson5Controller@compact');
$router->get('/lesson5/with', 'Lesson5Controller@with');
$router->get('/lesson5/with/constraint', 'Lesson5Controller@with_constraint');
$router->get('/lesson5/combined', 'Lesson5Controller@combined');