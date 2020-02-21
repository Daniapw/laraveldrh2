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
    public static function getIndex(){
        $libros=Book::all();
        return view("libros.index")
            ->with("libros", $libros);
    }

    /**
     * Pagina de informacion del libro
     */
    public static function getInfo($id){
        $libro=Book::findOrFail($id);
        $reviews=$libro->reviews;

        //Comprobar si el usuario ha escrito una review de este libro y pasarla por parametro
        if (Auth::check())
            $review_usuario=Auth::user()->reviews()->where('book_id','=', $libro->id)->first();
        else
            $review_usuario=false;

        return view("libros.info")
            ->with("libro", $libro)
            ->with("reviews", $reviews)
            ->with('review_usuario', $review_usuario);
    }

    /**
     * Buscar libros
     * @param $q
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function postBuscar(Request $request){
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
    public static function putFavorito($id){
        $libro=Book::find($id);
        Auth::user()->books()->attach($libro);
        Auth::user()->save();

        return self::getInfo($id);
    }

    /**
     * Quitar libro de favoritos
     * @param $id
     * @return mixed
     */
    public static function deleteFavorito($id){
        $libro=Book::find($id);
        Auth::user()->books()->detach($libro);
        Auth::user()->save();

        return self::getInfo($id);
    }

}
