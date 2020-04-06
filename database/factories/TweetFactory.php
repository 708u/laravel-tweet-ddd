<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Eloquent\Tweet;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence,
    ];
});
