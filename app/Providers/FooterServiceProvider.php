<?php

namespace App\Providers;

use App\Course;
use App\Category;
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
        view()->composer('/inc/footer',function($view){
            $cats=Category::take(6)->get();
            $view->with('cats',$cats);
        });
    }
}
