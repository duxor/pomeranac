<?php

Route::controller('/administracija/sadrzaji','Content');
Route::controller('/administracija/galerije','Administracija\Galerija');
Route::controller('/administracija','Administracija\Administracija');
//Route::controller('/administracija','Administracija');

Route::get('/login','Log@getLogin');
Route::get('/logout','Log@getLogout');
Route::controller('/log','Log');

Route::controller('/','Glavni');
