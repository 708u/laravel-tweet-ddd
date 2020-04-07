<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Eloquent\Tweet;
use Domain\Application\Contract\Uuid\UuidGeneratable;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    return [
        'uuid'    => resolve(UuidGeneratable::class)->nextIdentifier(),
        'content' => $faker->sentence,
    ];
});
