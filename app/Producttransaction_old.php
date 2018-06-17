<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_transaction extends Model
{
    //
    protected $table = 'product_transaction';
    protected $fillable = [
        'product_id', 'transaction_id'
    ];
}
