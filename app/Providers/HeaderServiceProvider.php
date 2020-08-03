<?php

namespace App\Providers;

use App\Home;
use App\Contact;
use Illuminate\Support\ServiceProvider;

class HeaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('/inc/header',function($view){
            $view->with('contacts',Contact::select('phone','email')->get()->first());
        });
        view()->composer('/inc/header',function($view){
            $view->with('logo',Home::select('logo')->get()->first());
        });
    }
}
