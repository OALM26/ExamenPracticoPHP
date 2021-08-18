<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('GetAlumnos','ApiAlumnoController@GetAlumnos');
Route::get('GetAlumno/{Maticula}','ApiAlumnoController@GetAlumno');

Route::get('GetEstatus','ApiAlumnoController@GetEstatus');
Route::get('GetGenero','ApiAlumnoController@GetGenero');
Route::get('GetGradoEscolar','ApiAlumnoController@GetGradoEscolar');

Route::post('PostAlumno','ApiAlumnoController@PostAlumno');
Route::put('PutAlumno','ApiAlumnoController@PutAlumno');