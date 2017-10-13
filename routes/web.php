<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', function()
{
    //return View::make('users');
    $users = DB::select('select * from users', [1]);

    return view('users', ['users' => $users]);
});

Route::get('/createStore/{name}/{address?}/{logoPath?}', function ($name="Anonymous",$address="",$logoPath= "") {

	try
	{
	DB::insert('insert into stores(name,address,logoPath) values (?,?,?)', [$name, $address, $logoPath]);
	} catch(Exception $e){
		return $e->getMessage();
	}

    return 'done';
});


Route::get('/viewStores', function()
{
    //return View::make('users');
    $Stores = DB::select('select * from stores');

    return $Stores;
});


Route::get('/viewStores/{storeID}', function($id)
{
    //return View::make('users');
    $Stores = DB::select('select * from stores where id = :id',['id' => $id]);

    return $Stores;
});