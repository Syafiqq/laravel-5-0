<?php namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

class RouteServiceProvider extends ServiceProvider
{

    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        $router->pattern('g_id', '[0-9]+');
        $router->patterns(['g_name' => '[a-z]+']);

        /**
         * place parent caller in the bottom of function according to:
         * @see https://laracasts.com/discuss/channels/general-discussion/route-global-pattern-in-routeserviceprovider-not-working-in-laravel-5
         * @see https://stackoverflow.com/questions/28251154/laravel-5-0-dev-defining-global-patterns-is-not-working/29567578#29567578
         * */
        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }

}
