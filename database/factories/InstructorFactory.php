<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Instructor;
use Faker\Generator as Faker;

$factory->define(Instructor::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'email'=>$faker->email,
        'password'=>$faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}'),
        'about'=>$faker->sentence(  6,  true),
        'country'=>$faker->country,
        'img'=>$faker->regexify('/^(team)[1-3]{1}\.(png)$/'),
        'DOB'=>$faker->date('Y-m-d', 'now'),
        'experience'=>$faker->sentence(  15,  true),
        'specialize'=>$faker->sentence(  2,  true),
        'created_at'=>now(),
        'updated_at'=>now()
    ];
});
