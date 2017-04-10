<?php

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
//mostrara el formulario de login
Route::get('login', 'UsuarioController@login')->name('usuarios.login');

//validara los datos del login
Route::post('logear', 'UsuarioController@logear')->name('usuarios.logear');

//rutas que se mostraran cuando el usuario inicie sesion
Route::group(['middleware' => 'autentificado'], function(){
	Route::get('/', 'PrincipalController@inicio')->name('principal.inicio');
	Route::get('logout', 'UsuarioController@logout')->name('usuarios.logout');
	Route::get('usuarios/registro', 'UsuarioController@registro')->name('usuarios.registro');
	Route::post('usuarios/registrar', 'UsuarioController@registrar')->name('usuarios.registrar');
	Route::get('usuarios/perfil', 'UsuarioController@perfil')->name('usuarios.perfil');
	//Route::get('usuarios/{id}/foto', 'UsuarioController@foto')
	//    ->name('usuarios.foto');
	Route::resource('usuarios', 'UsuarioController');	
});

