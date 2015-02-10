<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'GlavniController@index');
Route::get('pocetna', 'GlavniController@index');


//Administracija START::
Route::get('administracija', 'AdministracijaController@index');
Route::get('administracija/pocetna', 'AdministracijaController@index');
Route::get('administracija/login', 'AdministracijaController@login');
Route::post('administracija/login/login','AdministracijaController@testLogin');
Route::get('administracija/o-nama', 'AdministracijaController@oNama');
Route::get('administracija/galerija-fotografija', 'AdministracijaController@galerijaFotografija');
Route::get('administracija/logout', 'AdministracijaController@logout');
//Administracija END::


//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);
