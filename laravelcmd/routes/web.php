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

Route::get('/', "LibrosController@getIndex")->name('inicio');
Route::get('/home', "LibrosController@getIndex");


//Rutas libros
Route::group(['prefix' => 'libros'], function(){

    Route::get('info/{id}', 'LibrosController@getInfo');

    //Rutas para agregar y quitar favoritos
    Route::group(['middleware'=>['verified', 'auth']], function(){
        Route::post('info/{id}', 'InfoController@post');
        Route::delete('info/{id}', 'InfoController@delete');
        Route::put('info/{id}', 'InfoController@put');
    });

    //Ruta para buscar libro
    Route::get('buscar', 'LibrosController@getBuscar');
});

//Rutas menu usuario normal
Route::group(['prefix' => 'usuario',  'middleware' => ['auth', 'verified']], function(){

    Route::get('favoritos', 'UsuarioController@getFavoritos');

});

//Rutas categorias
Route::prefix('categoria')->group(function(){
    Route::get('indice', 'CategoriaController@getIndiceCategorias');
    Route::get('ver/{id}', 'CategoriaController@getLibrosCategoria');
});

Auth::routes(['verify' => true]);
