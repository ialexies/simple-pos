<?php

use Faker\Generator as Faker;

$factory->define(App\Transaction::class, function (Faker $faker) {
    return [
        //

        'user' => $faker->name(),
        'items' => $faker->text(15),
        'status' => $faker->text(5),
        'customer' => $faker->name()

    ];
});
