<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarEditLibro;
use App\Http\Requests\ValidarLibro;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
    public static function getBuscar(Request $request){
        $q=$request->input('buscar-libro');

        $query=strtolower($q);
        $libros=Book::whereRaw("lower(title) like '%$query%'")->get();

        return view('libros.buscar')
            ->with('libros',$libros)
            ->with('q',$q);
    }


    /**
     * Crear libro
     * @param $id
     */
    public static function createLibro(ValidarLibro $request){
        $datos=$request->validated();

        $imagen="default_cover.jpg";


        //Mover imagen al directorio assets/img/caratulas_libros con nombre nuevo
        if (array_key_exists('imagen_caratula', $datos)) {
            $imagen=time()."".$datos['imagen_caratula']->getClientOriginalName();
            $datos['imagen_caratula']->move('assets/img/caratulas_libros', $imagen);
        }


        $libro=Book::create([
            'title' => $datos['title'],
            'author' => $datos['autor'],
            'genre_id'=>$datos['categoria'],
            'publication_date'=>$datos['fecha_pub'],
            'synopsis'=>$datos['sinopsis'],
            'expanded_info'=>$datos['info'],
            'cover_img_file'=>$imagen
        ]);

        return AdminController::getPanelLibros();
    }

    /**
     * Editar libro
     * @param $id
     */
    public static function editLibro(ValidarEditLibro $request){
        $datos=$request->validated();

        $libro=Book::find($request->input('id'));

        $imagen=$libro->cover_img_file;

        //Mover imagen al directorio assets/img/caratulas_libros con nombre nuevo
        if (array_key_exists('imagen_caratula', $datos)) {
            $imagen=time()."".$datos['imagen_caratula']->getClientOriginalName();
            $datos['imagen_caratula']->move('assets/img/caratulas_libros', $imagen);
        }

        $libro->title=$datos['title'];
        $libro->author=$datos['autor'];
        $libro->genre_id=$datos['categoria'];
        $libro->publication_date=$datos['fecha_pub'];
        $libro->synopsis=$datos['sinopsis'];
        $libro->expanded_info=$datos['info'];
        $libro->cover_img_file=$imagen;

        $libro->save();

        return AdminController::getPanelLibros();
    }

    /**
     * Borrar libro
     * @param $id
     */
    public static function deleteLibro(Request $request){
        $id=$request->input('id');

        try {
            $libro = Book::findOrFail($id);

            $libro->reviews()->delete();
            $libro->users()->detach();

            $libro->delete();
        }
        catch (ModelNotFoundException $e){

        }

        return AdminController::getPanelLibros();
    }

}
