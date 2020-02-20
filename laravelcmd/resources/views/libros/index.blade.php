@extends('layouts.main')
@section('contenido')

    <div class="row mt-3 p-1 p-sm-0">

        @if(count($libros)<=0)
            <div class="col-12 col-md-8">
                <h1>No hay libros registrados en la base de datos</h1>
            </div>
        @else
            <!--Segunda columna: busqueda, categorias-->
            @include('partials.sidebar')

            <!--Primera columna: libros-->
            @include('partials.libros')

        @endif


    </div>
@endsection