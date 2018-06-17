<?php

use App\Transaction;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/trans',function (){
	$transaction=Transaction::findorFail(1);
		// dd($user); 
		
		foreach($transaction->products as $product){
		// dd($role);
		echo $product->name . "<br>";
		// dd($role);
	}
});
