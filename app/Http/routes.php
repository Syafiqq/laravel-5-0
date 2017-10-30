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
    $router->get('/songs', 'S01\E06\SongsController@songList');
    $router->group(['middleware' => ['songs.get']], function () use ($router) {
        $router->get('/songs/{id}', 'S01\E06\SongsController@songGet');
    });

    //Regular Expression Parameter Constraints
    $router->get('/songs9/{id}', function ($id) {
        /**
         * @see https://laracasts.com/discuss/channels/laravel/route-to-continue-looking
         * @see https://laracasts.com/discuss/channels/laravel/change-laravel-route-parameter
         * @see https://scotch.io/tutorials/get-laravel-route-parameters-in-middleware
         *
         * */
        /** @var \Illuminate\Foundation\Application $app */
        $app = \Illuminate\Support\Facades\App::getFacadeRoot();
        /** @var \App\Http\Controllers\S01\E06\SongsController $songs */
        $songs = $app->make("App\Http\Controllers\S01\E06\SongsController");

        return $songs->songGet($id);
    });
    //Other Basic Routes
    $router->post('/songs1', 'S01\E06\SongsController@songList');
    //Registering A Route For Multiple Verbs
    $router->match(['get', 'post'], '/songs2', 'S01\E06\SongsController@songList');
    //Optional Route Parameters
    $router->get('/songs3/{id?}/{name?}', 'S01\E06\SongsController@songDispatcher')
        ->where('id', '[0-9]+')//Regular Expression Parameter Constraints
        ->where('name', '[a-z]+'); //Regular Expression Parameter Constraints
    $router->get('/songs4/{id?}/{name?}', 'S01\E06\SongsController@songDispatcher')
        ->where(['id' => '[0-9]+', 'name' => '[a-z]+']);//Regular Expression Parameter Constraints
    $router->get('/songs5/{g_id?}/{g_name?}', 'S01\E06\SongsController@songDispatcher');
    //Named Routes
    $router->get('/songs6/{g_id?}/{g_name?}', ['as' => 'ssong6', function () use ($log, $router) {
        $url = route('ssong6');

        $redirect = redirect()->route('ssong6');
        $name     = $router->currentRouteName();
        $log->error($url);
        $log->error($name);
        $log->error($redirect);
    }]);
});
//Route Groups
$router->group(['namespace' => 'S01', 'prefix' => 's01'], function () use ($router) {
    $router->group(['namespace' => 'E06'], function () use ($router) {
        $router->get('e06/songs7/{g_id?}/{g_name?}', 'SongsController@songDispatcher');
    });
});
$router->group([
    'domain' => 'laravel.{version}.com',
    'where' => ['version' => '50'],
    'prefix' => 's01/e06',
    'namespace' => 'S01\\E06'
], function () use ($log, $router) {
    $router->get('songs8/{g_id?}/{g_name?}', function ($version) use ($log) {
        $log->error($version);
    });
});
