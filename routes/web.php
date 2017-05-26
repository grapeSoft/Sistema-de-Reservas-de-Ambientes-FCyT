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
Route::get('recuperarC', 'UsuarioController@recuperarContrasea')->name('usuarios.recuperarC');
Route::post('enviar', 'UsuarioController@enviarContrasea')->name('usuarios.enviarContrasea');


Route::get('/', 'PrincipalController@inicio')->name('principal.inicio');
Route::get('logout', 'UsuarioController@logout')->name('usuarios.logout');
Route::get('usuarios/perfil', 'UsuarioController@perfil')->name('usuarios.perfil');
Route::get('usuarios/{id}/foto', 'UsuarioController@foto')
    ->name('usuarios.foto');
Route::resource('usuarios', 'UsuarioController');

Route::post('reservas/config', 'ReservaController@updateConfig')->name('reservas.updateConfig');
Route::get('reservas/config', 'ReservaController@config')->name('reservas.config');


Route::get('reservas/{reserva}/eventos', 'EventoController@oferta')->name('eventos.oferta');
Route::post('reservas/{reserva}/eventos', 'EventoController@almacenar')->name('eventos.almacenar');



Route::get('reservas/horarios', 'ReservaController@horarios')->name('reservas.horarios');
Route::resource('reservas', 'ReservaController');
Route::post('registros', 'UsuarioController@registrarUsuarios')->name('usuarios.registrarUsuarios');
Route::post('reservas/filtrado', 'ReservaController@filtrado')->name('reservas.filtrado');


