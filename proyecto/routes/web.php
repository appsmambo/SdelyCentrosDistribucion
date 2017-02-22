<?php

Route::get('/', 'HomeController@getHome');
Route::post('/consultaDatos', 'RegistroController@postDatos');

Route::group(['prefix' => 'admin159753'], function () {
	Route::get('/', function () {
		return view('admin.home');
	});
	Route::get('/correos', 'AdminController@getCorreos');
	Route::get('users', function () {
		// Matches The "/admin/users" URL
	});
});
