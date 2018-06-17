<?php

use Illuminate\Database\Seeder;

class ProductTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Producttransaction::class, 8)->create();
    }
}
