<?php

use App\Product;
use App\Transaction;
use Faker\Generator as Faker;

$factory->define(App\Producttransaction::class, function (Faker $faker) {
    $products = Product::pluck('id')->all();
    $transactions = Transaction::pluck('id')->all();
    return [
        //
        'product_id'=>$faker->randomElement($products),
        'transaction_id'=>$faker->randomElement($transactions),
    ];
});
