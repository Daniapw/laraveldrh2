<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Grupo de rutas a las que se les aplicara un prefijo y lo que queramos
Route::group(['prefix'=>'libros', "middleware"=>"auth.basic.once"], function(){
    Route::get('all', 'APIController@index');

    Route::get('show/{id}', 'APIController@show');

});
