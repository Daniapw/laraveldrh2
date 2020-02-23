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
    Route::get('perfil', 'UsuarioController@getPerfil');


});

//Rutas categorias
Route::prefix('categoria')->group(function(){
    Route::get('indice', 'CategoriaController@getIndiceCategorias');
    Route::get('ver/{id}', 'CategoriaController@getLibrosCategoria');
});

//Rutas del panel de administracion con middleware personalizado que comprobara si el usuario logeado tiene el rol 'admin'
Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function(){
    Route::get('panel', 'AdminController@getPanelPrincipal');

    //Panel de gestion de usuarios
    Route::group(['prefix'=>'panel_usuarios'], function(){
        Route::get('listado', 'AdminController@getPanelUsuarios');
        Route::delete('listado', 'UsuarioController@deleteUsuario');
    });


    //Panel de gestion de libros
    Route::group(['prefix'=>'panel_libros'], function(){
        Route::get('listado', 'AdminController@getPanelLibros');
        Route::delete('listado', 'LibrosController@deleteLibro');

        Route::get('crear', 'AdminController@getCrearLibro');
        Route::post('crear', 'LibrosController@createLibro');

        Route::get('editar', 'AdminController@getEditarLibro');
        Route::put('editar', 'LibrosController@editLibro');

    });

    //Panel de gestion de categorias
    Route::group(['prefix'=>'panel_categorias'], function(){
        Route::get('listado', 'AdminController@getPanelCategorias');
        Route::delete('listado', 'CategoriaController@deleteCategoria');

        Route::get('crear', 'AdminController@getCrearCategoria');
        Route::post('crear', 'CategoriaController@createCategoria');


        Route::get('editar', 'AdminController@getEditarCategoria');
        Route::put('editar', 'CategoriaController@editCategoria');
    });

});

Auth::routes(['verify' => true]);
