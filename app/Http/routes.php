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
$router->get('/template/boilerplate', 'TemplateController@boilerplate');
$router->get('/template/bootstrap', 'TemplateController@bootstrap');
$router->get('/template/adminlte', 'TemplateController@adminlte');
$router->get('/template/semantic', 'TemplateController@semantic');
//Lesson 006
$router->group(['prefix' => 's01/e06'], function () use ($log, $router) {
    //Basic GET Route
    $router->get('/songs', 'S01\E06\SongsController@lists');
    $router->group(['middleware' => ['songs.get']], function () use ($router) {
        $router->get('/songs/{id}', 'S01\E06\SongsController@find');
    });

    //Regular Expression Parameter Constraints
    $router->get('/songs9/{id}', function (\App\Song $song, $id) {
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

        return $songs->find($song, $id);
    });
    //Other Basic Routes
    $router->post('/songs1', 'S01\E06\SongsController@lists');
    //Registering A Route For Multiple Verbs
    $router->match(['get', 'post'], '/songs2', 'S01\E06\SongsController@lists');
    //Optional Route Parameters
    $router->get('/songs3/{id?}/{name?}', 'S01\E06\SongsController@dispatcher')
        ->where('id', '[0-9]+')//Regular Expression Parameter Constraints
        ->where('name', '[a-z]+'); //Regular Expression Parameter Constraints
    $router->get('/songs4/{id?}/{name?}', 'S01\E06\SongsController@dispatcher')
        ->where(['id' => '[0-9]+', 'name' => '[a-z]+']);//Regular Expression Parameter Constraints
    $router->get('/songs5/{g_id?}/{g_name?}', 'S01\E06\SongsController@dispatcher');
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
        $router->get('e06/songs7/{g_id?}/{g_name?}', 'SongsController@dispatcher');
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
