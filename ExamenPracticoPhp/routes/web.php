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

Route::get('/', 'AlumnoController@Index')->name('/');
Route::post('/Alumnos', 'AlumnoController@Alumnos')->name('Alumnos');
Route::get('/AlumnosList', 'AlumnoController@AlumnosList')->name('AlumnosList');


Route::get('/Alumno-Create', 'AlumnoController@Create')->name('Alumno-Create');
Route::post('/Alumno-Save','AlumnoController@Save')->name('Alumno-Save');
Route::get('/Alumno-Edit/{id}','AlumnoController@Edit')->name('Alumno-Edit');
Route::post('/Alumno-Update/{id}','AlumnoController@Update')->name('Alumno-Update');
Route::get('/Alumno-Delete/{id}','AlumnoController@Delete')->name('Alumno-Delete');
