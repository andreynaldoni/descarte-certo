<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Route::get('/Pontos de Descarte', 'MapController@index');
Route::get('/Pontos de Descarte/{ponto}', 'MapController@detail');

Route::get('/Administrativo', 'AdminController@index');
Route::get('/Administrativo/{categoria}', 'AdminController@categoria');
Route::get('/Administrativo/{categoria}/{objeto}', 'AdminController@objeto');
Route::get('/Administrativo/{categoria}/{objeto}/{conteudo}', 'AdminController@conteudo');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/{categoria}', 'CategoryController@index');

Route::get('/{categoria}/{objeto}', 'ObjectController@index');

Route::get('/{categoria}/{objeto}/{conteudo}', 'ContentController@index');
