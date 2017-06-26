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
Route::post('usuarios/updatePassword/{usuario}', 'UsuarioController@updatePassword')->name('usuarios.updatePassword');
Route::resource('usuarios', 'UsuarioController');

Route::post('reservas/config', 'ReservaController@updateConfig')->name('reservas.updateConfig');
Route::get('reservas/config', 'ReservaController@config')->name('reservas.config');

Route::get('reservas/calendario', 'ReservaController@calendario')->name('reservas.calendario');

Route::get('reservas/horarios', 'ReservaController@horarios')->name('reservas.horarios');
Route::resource('reservas', 'ReservaController');
Route::post('registros', 'UsuarioController@registrarUsuarios')->name('usuarios.registrarUsuarios');
Route::post('reservas/filtrado', 'ReservaController@filtrado')->name('reservas.filtrado');


Route::put('calendario/config/{gestion}/', 'CalendarioController@updateConfig')->name('calendario.updateConfig');
Route::get('calendario/config/{gestion}/edit', 'CalendarioController@editConfig')->name('calendario.editConfig');
Route::delete('calendario/config/{gestion}', 'CalendarioController@deleteConfig')->name('calendario.deleteConfig');
Route::post('calendario/config', 'CalendarioController@createConfig')->name('calendario.createConfig');
Route::get('calendario/config', 'CalendarioController@config')->name('calendario.config');


Route::get('crearpdf/{eventos}', 'PDFController@crearpdf')->name('crearpdf');
Route::get('descargarpdf/{eventos}', 'PDFController@descargarpdf')->name('descargarpdf');

Route::resource('calendario', 'CalendarioController');
Route::resource('feriado', 'FeriadoController');

