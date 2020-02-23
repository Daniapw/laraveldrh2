<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarCategoria;
use App\Http\Requests\ValidarEditCategoria;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function getIndiceCategorias(){
        $generos=Genre::all();

        return view("categorias.indice_categorias")
            ->with("generos",$generos);
    }

    /**
     * Pagina libros categoria
     * @param $id
     */
    public function getLibrosCategoria($id){
        $generos=Genre::all();
        $genero=Genre::find($id);
        $libros=$genero->books;

        return view("categorias.categoria")
            ->with('libros', $libros)
            ->with('genero', $genero)
            ->with('generos', $generos);
   }


    /**
     * Crear categoria
     * @param $id
     */
    public static function createCategoria(ValidarCategoria $request){
        $datos=$request->validated();

        $icono="fas fa-folder";

        if ($request->has('icono'))
            $icono=$request->input('icono');

        Genre::create([
           "name"=>$datos['name'],
           "icon"=>$icono
        ]);

        return AdminController::getPanelCategorias();
    }

    /**
     * Editar categoria
     * @param $id
     */
    public static function editCategoria(ValidarEditCategoria $request){
        $datos=$request->validated();

        $genero=Genre::find($request->input('id'));

        $icono=$genero->icon;

        //Mover imagen al directorio assets/img/caratulas_libros con nombre nuevo
        if (array_key_exists('icono', $datos)) {
            $icono=$request->input('icono');
        }

        $genero->name=$request->input('name');
        $genero->icon=$icono;

        $genero->save();

        return AdminController::getPanelCategorias();
    }



    /**
     * Borrar categoria
     * @param $id
     */
    public static function deleteCategoria(Request $request){
        $id=$request->input('id');

        try {
            $genero = Genre::findOrFail($id);

            $libros=$genero->books;

            foreach ($libros as $libro){
                $libro->reviews()->delete();
                $libro->users()->detach();

                $libro->delete();
            }

            $genero->delete();
        }
        catch (ModelNotFoundException $e){

        }

        return AdminController::getPanelCategorias();
    }


}
