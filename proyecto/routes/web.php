<?php

Route::get('/', 'HomeController@getHome');
Route::post('/consultaDatos', 'RegistroController@postDatos');

Route::group(['prefix' => 'admin159753'], function () {
	Route::get('/', function () {
		return view('admin.home');
	});
	
	Route::get('/correos', 'AdminController@getCorreos');
	Route::get('/correos-crear', 'AdminController@getCorreosCrear');
	Route::post('/correos-crear', 'AdminController@postCorreosCrear');
	Route::get('/correos-editar', 'AdminController@getCorreosEditar');
	Route::post('/correos-editar', 'AdminController@postCorreosEditar');
	
	Route::get('/centros', 'AdminController@getCentros');
	Route::get('/centros-crear', 'AdminController@getCentrosCrear');
	Route::post('/centros-crear', 'AdminController@postCentrosCrear');
	Route::get('/centros-editar', 'AdminController@getCentrosEditar');
	Route::post('/centros-editar', 'AdminController@postCentrosEditar');
	
	Route::get('/registros', 'AdminController@getRegistros');
	Route::get('/registros-export', 'AdminController@getRegistrosExport');
	Route::get('/registros-borrar/{id}', 'AdminController@getRegistrosBorrar');
	Route::get('/registros-contactado/{id}/{val}', 'AdminController@getRegistrosContactado');
	Route::get('/registros-afiliado/{id}/{val}', 'AdminController@getRegistrosAfiliado');
	
	Route::get('users', function () {
		// Matches The "/admin/users" URL
	});
});
