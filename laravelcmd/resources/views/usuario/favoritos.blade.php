@extends('layouts.main')
@section('contenido')

    <div class="text-center mt-3">
        <h1>Mis libros favoritos</h1>
    </div>

    <div class="row mt-3 p-1 p-sm-0">

        @if(count($libros)<=0)
            <div class="col-12 text-center mt-5">
                <h2 class="text-muted">¡Aún no has agregado ningún libro a favoritos! </h2>
                <p class="text-muted">Para agregar un libro a favoritos simplemente haz click en el botón 'Agregar a favoritos' que aparece en la página de información del libro.</p>

            </div>
        @else

        <!--Libros-->
        @foreach($libros as $libro)
            <div class="col-12 col-md-6 col-lg-3 ">
                <div class="p-4 p-md-3">
                    <img src="{{asset('assets/img/caratulas_libros/'.$libro->cover_img_file)}}" class="w-100" alt="">
                    <div class="text-center">
                        <a href="{{url('/libros/info/'.$libro->id)}}" class="titulo-favorito font-weight-bold">{{$libro->title}}</a>
                        <p class="text-muted">{{$libro->author}}</p>
                    </div>
                </div>
            </div>
        @endforeach

        @endif


    </div>
@endsection