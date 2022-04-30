<?php

use Illuminate\Support\Facades\Route;


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

Route::get('Prestamo', 'App\Http\Controllers\PrestamoController@index');
Route::post('Guardar', 'App\Http\Controllers\PrestamoController@guardar');
Route::get('Editar/{COD_PRESTAMO}', 'App\Http\Controllers\PrestamoController@editar');
Route::get('Eliminar/{COD_PRESTAMO}', 'App\Http\Controllers\PrestamoController@eliminar');
Route::post('Actualizar', 'App\Http\Controllers\PrestamoController@actualizar');


/*-----CREDITO-----*/
Route::get('Credito', 'App\Http\Controllers\CreditoController@index');
Route::post('guardar', 'App\Http\Controllers\CreditoController@guardar');
Route::get('EditarC/{COD_TAR_CREDITO}', 'App\Http\Controllers\CreditoController@editar');
Route::post('Actualizar', 'App\Http\Controllers\CreditoController@actualizar');
Route::get('EliminarC/{COD_TAR_CREDITO}', 'App\Http\Controllers\CreditoController@eliminarC');

/*----- CUENTA----- */
Route::get('Cuenta', 'App\Http\Controllers\CuentaController@index');
Route::post('GuardarCu', 'App\Http\Controllers\CuentaController@guardar');
Route::get('EditarCu/{COD_CTA}', 'App\Http\Controllers\CuentaController@editar');
Route::get('EliminarCu/{COD_CTA}', 'App\Http\Controllers\CuentaController@eliminar');
Route::post('Actualizar', 'App\Http\Controllers\CuentaController@actualizar');

/*------- LOGIN--------- */

Route::get('Persona', 'App\Http\Controllers\PersonaController@index');
Route::post('GuardarP', 'App\Http\Controllers\PersonaController@guardar');
Route::get('EditarP/{COD_PERSONA}', 'App\Http\Controllers\PersonaController@editar');
Route::get('EliminarP/{COD_PERSONA}', 'App\Http\Controllers\PersonaController@eliminar');
Route::post('Actualizar', 'App\Http\Controllers\PersonaController@actualizar');

/*-------- REPORTES ---------- */

Route::get('Reporte', 'App\Http\Controllers\ReporteController@index');
Route::post('GuardarR', 'App\Http\Controllers\ReporteController@guardar');
Route::get('EliminarR/{ID_REPORTE}', 'App\Http\Controllers\ReporteController@eliminar');