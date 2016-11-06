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
Route::get('/Pontos de Descarte/{ponto}', 'MapController@detalhe');

Route::post('/Pontos de Descarte/edit', 'MapController@postEditPonto');
Route::post('/Pontos de Descarte/{ponto}/edit', 'MapController@PostEditDetalhe');

Route::post('/Pontos de Descarte', 'MapController@postPonto');
Route::post('/Pontos de Descarte/{ponto}/{id}', 'MapController@postDetalhe');

Route::get('/Administrativo', 'AdminController@index');
Route::get('/Administrativo/{categoria}', 'AdminController@categoria');
Route::get('/Administrativo/{categoria}/{objeto}', 'AdminController@objeto');
Route::get('/Administrativo/{categoria}/{objeto}/{conteudo}', 'AdminController@conteudo');

Route::post('/Administrativo/{categoria}/delete', 'AdminController@postDeleteCategoria');
Route::post('/Administrativo/{categoria}/{objeto}/delete', 'AdminController@postDeleteObjeto');
Route::post('/Administrativo/{categoria}/{objeto}/{conteudo}/delete', 'AdminController@postDeleteConteudo');

Route::post('/Administrativo/{categoria}/edit', 'AdminController@postEditCategoria');
Route::post('/Administrativo/{categoria}/{objeto}/edit', 'AdminController@postEditObjeto');
Route::post('/Administrativo/{categoria}/{objeto}/{conteudo}/edit', 'AdminController@postEditConteudo');

Route::post('/Administrativo', 'AdminController@postCategoria');
Route::post('/Administrativo/{categoria}/{id}', 'AdminController@postObjeto');
Route::post('/Administrativo/{categoria}/{objeto}/{id}', 'AdminController@postConteudo');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/{categoria}', 'CategoryController@index');

Route::get('/{categoria}/{objeto}', 'ObjectController@index');

Route::get('/{categoria}/{objeto}/{conteudo}', 'ContentController@index');
