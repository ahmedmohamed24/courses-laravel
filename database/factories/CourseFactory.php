<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3, true),
        'briefDesc' => $faker->sentence(10, true),
        'desc' => $faker->sentence(40, true),
        'price' => $faker->numberBetween(0.99, 9999.99),
        'img' => $faker->regexify('/^[1-3]{1}\.(png)$/'),
        'cat_id' => $faker->numberBetween(1, 20),
        'instructor_id' => $faker->numberBetween(1, 60),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
