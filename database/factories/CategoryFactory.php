<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence(3,true),
        'created_at'=>now(),
        'updated_at'=>now(),
        'img'=>$faker->regexify('/^(cat)[1-6]{1}\.(svg)$/')
    ];
});
