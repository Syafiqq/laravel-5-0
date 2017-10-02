<?php
/**
 * This <laravel-5-0> project created by :
 * Name         : syafiq
 * Date / Time  : 02 October 2017, 12:00 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

namespace App\Http\ViewComposers;


use Illuminate\Contracts\View\View as ViewContracts;

class ProfileComposer
{

    /**
     * The user repository implementation.
     *
     * @var int
     */
    protected $profileComposer;

    /**
     * Create a new profile composer.
     *
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->profileComposer = ['Profile Composer'];
    }

    /**
     * Bind data to the view.
     *
     * @param  ViewContracts $view
     * @return void
     */
    public function compose(ViewContracts $view)
    {
        $view->with('profile_composer', $this->profileComposer);
    }

}

?>