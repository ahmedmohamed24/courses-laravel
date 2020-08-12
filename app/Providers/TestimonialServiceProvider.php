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
            // $reviewIDs=PopularReview::select('review_id')->get();
            // $popularReviews=$reviewIDs->transform(function($key){
            //     return Review::where('id',$key->review_id)->get();
            // });
             $data=[];
            $reviewIDs=PopularReview::select('review_id')->get();
            $popularReviews=$reviewIDs->transform(function($key){
                $rev = Review::where('id',$key->review_id)->get();
                $data['img']=$rev[0]->student()->get('img')[0]->img;
                $data['content']=$rev[0]->content;
                $data['rate']=$rev[0]->rate;
                return $data;
            });
            $view->with('popularReviews',$popularReviews);
        });
    }
}
