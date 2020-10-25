<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence(6, true),
        'rate' => $faker->numberBetween(1, 5),
        'course_id' => $faker->numberBetween(1, 140),
        'student_id' => $faker->numberBetween(1, 100),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
