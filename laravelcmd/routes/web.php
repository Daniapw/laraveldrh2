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

Route::get('/', "LibrosController@getIndex");

Route::prefix('libros')->group(function(){
    Route::get('info/{id}', 'LibrosController@getInfo');
    Route::post('buscar', 'LibrosController@postBuscar');
});

Route::prefix('categoria')->group(function(){
    Route::get('indice', 'CategoriaController@getIndiceCategorias');
    Route::get('ver/{id}', 'CategoriaController@getLibrosCategoria');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
