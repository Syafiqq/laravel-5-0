<?php namespace App\Providers;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\ServiceProvider;

class DummyProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /** @var \Illuminate\Contracts\View\Factory $view */
        $view = ViewFacade::getFacadeRoot();
        // Using class based composers...
        $view->composer('layout.lesson5.lesson5_default', 'App\Http\ViewComposers\ProfileComposer');

        // Using Closure based composers...
        $view->composer('layout.lesson5.lesson5_default', function (ViewContract $view) {
            $view->with('composer', ['composer']);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
