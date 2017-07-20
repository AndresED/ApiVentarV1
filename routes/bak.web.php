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

Route::get('/', function () {
    return view('welcome');
});
//INSERTS
Route::get('insertUsers/{dni}/{nombresyapellidos}/{username}/{estado}/{email}/{sincronizado}/{password}/{telefono}/{permiso}/{ruta_foto_perfil}', 'SincronizarController@insertUsers')->name('insertUsers');

Route::get('insertAlumnos/{dni}/{nombresyapellidos}/{email}/{departamento}/{provincia}/{direccion}/{echa_nacimiento}/{grado}/{profesion}/{trabajo}/{sincronizado}/{telefono}', 'SincronizarController@insertUsers')->name('insertAlumnos');

Route::get('insertTarjetas/{id}/{tipo}/{banco}/{numero}/{mes}/{anio}/{sincronizado}', 'SincronizarController@insertUsers')->name('insertTarjetas');

Route::get('insertProgramas/{id}/{nombre}/{estado}/{sincronizado}', 'SincronizarController@insertUsers')->name('insertProgramas');

Route::get('insertPMatricula/{id}/{cantidad}/{descuento}/{tipo_descuento}/{sincronizado}/{programa_id}', 'SincronizarController@insertUsers')->name('insertPMatricula');

Route::get('insertInscripcions/{id}/{cantidad}/{descuento}/{tipo_descuento}/{sincronizado}/{programa_id}', 'SincronizarController@insertUsers')->name('insertInscripcions');

Route::get('insertMensualidads/{id}/{cantidad}/{descuento}/{tipo_descuento}/{sincronizado}/{programa_id}', 'SincronizarController@insertUsers')->name('insertMensualidads');

Route::get('insertMatriculas/{id}/{fecha_matricula}/{user_id}/{alumno_id}/{tarjeta_id}/{programa_id}/{sincronizado}', 'SincronizarController@insertUsers')->name('insertMatriculas');

//DELETES
Route::get('deletedTable/{id}/{tabla}', 'SincronizarController@deletedTable')->name('deletedTable');

//UPDATES
Route::get('updateUsers/{dni}/{nombresyapellidos}/{username}/{estado}/{email}/{sincronizado}/{password}/{telefono}/{permiso}/{ruta_foto_perfil}', 'SincronizarController@updateUsers')->name('updateUsers');

Route::get('updateAlumnos/{dni}/{nombresyapellidos}/{email}/{departamento}/{provincia}/{direccion}/{echa_nacimiento}/{grado}/{profesion}/{trabajo}/{sincronizado}/{telefono}', 'SincronizarController@updateUsers')->name('updateAlumnoss');

Route::get('updateTarjetas/{id}/{tipo}/{banco}/{numero}/{mes}/{anio}/{sincronizado}', 'SincronizarController@updateUsers')->name('updateTarjetas');

Route::get('updateProgramas/{id}/{nombre}/{estado}/{sincronizado}', 'SincronizarController@updateUsers')->name('updateProgramas');

Route::get('updatePMatricula/{id}/{cantidad}/{descuento}/{tipo_descuento}/{sincronizado}/{programa_id}', 'SincronizarController@updatePMatricula')->name('updatePMatricula');

Route::get('updateInscripcions/{id}/{cantidad}/{descuento}/{tipo_descuento}/{sincronizado}/{programa_id}', 'SincronizarController@updateInscripcions')->name('updateInscripcions');

Route::get('updateMensualidads/{id}/{cantidad}/{descuento}/{tipo_descuento}/{sincronizado}/{programa_id}', 'SincronizarController@updateMensualidads')->name('updateMensualidads');

Route::get('updateMatriculas/{id}/{fecha_matricula}/{user_id}/{alumno_id}/{tarjeta_id}/{programa_id}/{sincronizado}', 'SincronizarController@updateMatriculas')->name('updateMatriculas');

//SELECTS
Route::get('selectTable/{table}', 'SincronizarController@selectTable')->name('selectTable');
