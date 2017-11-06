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
/** @var \Illuminate\Contracts\Logging\Log $log */
$log = \Illuminate\Support\Facades\Log::getFacadeRoot();

/** @var \Illuminate\Routing\Router $router */
$router->get('/', 'WelcomeController@index');
/*Template*/
$router->get('/template/boilerplate', 'TemplateController@boilerplate');
$router->get('/template/bootstrap', 'TemplateController@bootstrap');
$router->get('/template/adminlte', 'TemplateController@adminlte');
$router->get('/template/semantic', 'TemplateController@semantic');
/*Lesson4*/
$router->get('/lesson4/direct', 'Lesson4Controller@direct');
$router->get('/lesson4/response', 'Lesson4Controller@response');
$router->get('/lesson4/json', 'Lesson4Controller@json');
$router->get('/lesson4/closure/direct', function () {
    return 'This is closure';
});
$router->get('/lesson4/closure/view', function () {
    return view('layout.lesson4.response.lesson4_response_default');
});

/*Lesson 5*/
$router->get('/lesson5/assoc', 'Lesson5Controller@assoc');
$router->get('/lesson5/compact', 'Lesson5Controller@compact');
$router->get('/lesson5/with', 'Lesson5Controller@with');
$router->get('/lesson5/with/constraint', 'Lesson5Controller@with_constraint');
$router->get('/lesson5/combined', 'Lesson5Controller@combined');

//Lesson 006
$router->group(['prefix' => 's01/e06'], function () use ($log, $router) {
    //Basic GET Route
    $router->get('/songs/create', 'S01\E06\SongsController@create');
    $router->post('/songs/create', 'S01\E06\SongsController@doCreate');
    $router->group(['middleware' => ['song.get', 'song.projection']], function () use ($router) {
        $router->get('/songs/{id}', 'S01\E06\SongsController@find');
        $router->group(['middleware' => 'song.push'], function () use ($router) {
            $router->get('/songs/{id}/edit', 'S01\E06\SongsController@update');
        });
        $router->patch('/songs/{id}/edit', 'S01\E06\SongsController@doUpdate');
    });
    $router->group(['middleware' => 'song.push'], function () use ($router) {
        $router->get('/songs', 'S01\E06\SongsController@lists');
    });
});
