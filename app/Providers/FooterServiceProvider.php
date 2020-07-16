<?php

namespace App\Providers;

use App\Course;
use Illuminate\Support\ServiceProvider;

class FooterServiceProvider extends ServiceProvider
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
        view()->composer('/inc/footer',function($view){
            $view->with('footerCourses',Course::take(6)->get());
        });
    }
}
