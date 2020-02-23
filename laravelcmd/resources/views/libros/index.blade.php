@extends('layouts.main')
@section('contenido')

    <div class="row mt-3 p-1 p-sm-0">

        @if(count($libros)<=0)
            <div class="col-12 col-md-8 text-center" >
                <p class="text-danger titulo-libro">No se han podido recuperar los libros de la base de datos, disculpe las molestias <i class="fas fa-frown"></i></p>
            </div>
        @else

            <!--Primera columna: libros-->
            @include('partials.libros')


        @endif

        <!--Segunda columna: busqueda, redes sociales-->
        @include('partials.sidebar')

    </div>
@endsection