<?php

Use App\User;
Use App\Address;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Create

Route::get('/insert/{id}', function($id){

$user = User::findOrFail($id);

$address = new Address(['name'=>'80 Bonza bay road beacon bay 5241']);

$user->address()->save($address);

return;

});

//Update

Route::get('/update/address/{id}', function($id){

 $address = Address::where('user_id',$id)->first();

 $address->name="744444 Updated Ave";

 $address->save();
});


//Read

Route::get('/read/{id}', function($id){

    $user=User::findOrFail($id);

    return $user->address->name;
});

//Delete

Route::get('/delete/{id}', function($id){

    $user=User::findOrFail($id);

    $user->address()->delete();

    return;
});
