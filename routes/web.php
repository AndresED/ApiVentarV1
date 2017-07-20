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
Route::get('insertUsers/{id}/{dni}/{nombresyapellidos}/{username}/{estado}/{email}/{sincronizado}/{password}/{telefono}/{permiso}/{ruta_foto_perfil}', 'SincronizarController@insertUsers');

Route::get('insertAlumnos/{id}/{dni}/{nombresyapellidos}/{email}/{departamento}/{provincia}/{direccion}/{echa_nacimiento}/{grado}/{profesion}/{trabajo}/{sincronizado}/{telefono}', 'SincronizarController@insertAlumnos');


Route::get('insertPrograma/{id}/{nombre}/{estado}/{duracion}/{cantidad_matricula}/{descuento_matricula}/{tipo_descuento_matricula}/{cantidad_mensualidad}/{descuento_mensualidad}/{tipo_descuento_mensualidad}/{sincronizado}', 'SincronizarController@insertProgramas');

Route::get('insertMatriculas/{id}/{fecha_matricula}/{user_id}/{alumno_id}/{programa_id}/{tipo_tarjeta}/{banco}/{numero_tarjeta}/{mes_tarjeta}/{anio_tarjeta}/{clave_seguridad_tarjeta}/{sincronizado}', 'SincronizarController@insertMatriculas');

//DELETES
Route::get('deletedTable/{id}/{tabla}', 'SincronizarController@deletedTable');

//UPDATES
Route::get('updateUsers/{id}/{dni}/{nombresyapellidos}/{username}/{estado}/{email}/{sincronizado}/{password}/{telefono}/{permiso}/{ruta_foto_perfil}', 'SincronizarController@updateUsers');

Route::get('updateAlumnos/{id}/{dni}/{nombresyapellidos}/{email}/{departamento}/{provincia}/{direccion}/{echa_nacimiento}/{grado}/{profesion}/{trabajo}/{sincronizado}/{telefono}', 'SincronizarController@updateAlumnos');


Route::get('updatePrograma/{id}/{nombre}/{estado}/{duracion}/{cantidad_matricula}/{descuento_matricula}/{tipo_descuento_matricula}/{cantidad_mensualidad}/{descuento_mensualidad}/{tipo_descuento_mensualidad}/{sincronizado}', 'SincronizarController@updateProgramas');

Route::get('updateMatriculas/{id}/{fecha_matricula}/{user_id}/{alumno_id}/{tarjeta_id}/{programa_id}/{sincronizado}', 'SincronizarController@updateMatriculas');

//SELECTS
Route::get('selectTable/{table}', 'SincronizarController@selectTable');

//ENVIO DE CORREOS
Route::get('enviarCorreo', 'SincronizarController@enviarCorreo')->name('enviarCorreo');
