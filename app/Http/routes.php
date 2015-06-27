<?php

Route::controller('/administracija/galerije','Administracija\Galerija');
Route::controller('/administracija','Administracija\Administracija');
//Route::controller('/administracija','Administracija');
Route::controller('/admin/sadrzaji','Content');

Route::get('/login','Log@getLogin');
Route::get('/logout','Log@getLogout');
Route::controller('/log','Log');


Route::controller('/','Glavni');
