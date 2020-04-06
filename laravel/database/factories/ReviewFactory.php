<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function () {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'user_id' => $faker->randomNumber(),
        'text' => $faker->realText(rand(20, 100)),
    ];
});
