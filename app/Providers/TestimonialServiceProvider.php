<?php

namespace App\Providers;

use App\PopularReview;
use App\Review;
use Illuminate\Support\ServiceProvider;

class TestimonialServiceProvider extends ServiceProvider
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
        view()->composer('inc/testimonial',function($view){
            $reviewIDs=PopularReview::select('review_id')->get();
            $popularReviews=$reviewIDs->transform(function($key){
                return Review::where('id',$key->review_id)->get();
            });
            $view->with('popularReviews',$popularReviews);
        });
    }
}
