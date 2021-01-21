<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'name' => "{$faker->name}'s Shop",
        'gold' => (array_sum(rollDice(3,6)) * 100)
    ];
});
