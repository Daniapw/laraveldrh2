<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibrosController extends Controller
{

    /**
     * Index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(){
        $libros=Book::all();
        $generos=Genre::all();
        return view("libros.index")
            ->with("libros", $libros);
    }

    /**
     * Pagina de informacion del libro
     */
    public function getInfo($id){
        $libro=Book::findOrFail($id);
        $reviews=$libro->reviews;
        $generos=Genre::all();

        return view("libros.info")
            ->with("libro", $libro)
            ->with("reviews", $reviews);
    }

    /**
     * Buscar libros
     * @param $q
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postBuscar(Request $request){
        $q=$request->input('buscar-libro');

        $query=strtolower($q);
        $libros=Book::whereRaw("lower(title) like '%$query%'")->get();

        return view('libros.buscar')
            ->with('libros',$libros)
            ->with('q',$q);
    }

}
