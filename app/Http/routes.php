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
Route::bind('tekst', function($slug)
{
    return App\Sadrzaj::where('tip_sadrzaja_id', 1)->where('slug', $slug)->first();
});
Route::bind('sadrzaj','App/Sadrzaj');

Route::get('administracija', 'AdministracijaController@index');
Route::get('administracija/pocetna', 'AdministracijaController@index');
Route::get('administracija/login', 'AdministracijaController@login');
Route::post('administracija/login/login','AdministracijaController@testLogin');
Route::get('administracija/sadrzaj/{tekst}', 'AdministracijaController@oNama');
Route::post('administracija/o-nama/', 'AdministracijaController@oNamaPost');
Route::get('administracija/galerija-fotografija', 'AdministracijaController@galerijaFotografija');
Route::get('administracija/logout', 'AdministracijaController@logout');
//Administracija END::


//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);
