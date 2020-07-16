<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'content'=>$faker->sentence(6,true),
        'rate'=>$faker->numberBetween(1,5),
        'course_id'=>$faker->numberBetween(1,80),
        'student_id'=>$faker->numberBetween(1,20),
        'created_at'=>now(),
        'updated_at'=>now()
    ];
});
