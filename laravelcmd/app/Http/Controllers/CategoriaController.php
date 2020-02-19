<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Http\Controllers\Controller;
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


}
