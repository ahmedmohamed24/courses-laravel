<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lecture;
use Faker\Generator as Faker;

$factory->define(Lecture::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(3,true),
        'desc'=>$faker->sentence(40,true),
        'img'=>$faker->regexify('/^(cat)[1-6]{1}\.(svg)$/'),
        'duration'=>$faker->time($format = 'H:i:s', $max = 'now'),
        'course_id'=>$faker->numberBetween(1,86),
        'created_at'=>now(),
        'updated_at'=>now(),
    ];
});
