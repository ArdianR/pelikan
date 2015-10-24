<?php

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

Route::group(['namespace' => 'Auth'], function(){
	Route::controllers([
		'auth' => 'AuthController',
		'password' => 'PasswordController'
	]);
});

Route::group(['middleware' => 'auth'], function(){
	Route::get('/', function () {
	    return view('welcome');
	});

	Route::controllers([
		'provinsi' =>'ProvinsiController',
		'identitas' => 'IdentitasController',
		'kota' =>'KotaController',
		'kecamatan' => 'KecamatanController',
		'hobi'=>'HobiController',
	]);
});
   hhhhhh