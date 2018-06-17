<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name(),
        'amount' => $faker->randomNumber($max = 3),
        'qty' => $faker->randomNumber($max = 4),

    ];
});
