<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibrosController extends Controller
{


    /**
     * Index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(){
        $libros=Book::all();
        return view("libros.index")
            ->with("libros", $libros);
    }

    /**
     * Pagina de informacion del libro
     */
    public function getInfo($id){
        $libro=Book::findOrFail($id);
        $reviews=$libro->reviews;

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

    /**
     * Poner libro en favoritos
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function putFavorito($id){
        $libro=Book::find($id);
        Auth::user()->books()->attach($libro);
        Auth::user()->save();

        return $this->getInfo($id);
    }

    /**
     * Quitar libro de favoritos
     * @param $id
     * @return mixed
     */
    public function deleteFavorito($id){
        $libro=Book::find($id);
        Auth::user()->books()->detach($libro);
        Auth::user()->save();

        return $this->getInfo($id);
    }

}
