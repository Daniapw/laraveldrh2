@extends('layouts.main')
@section('contenido')

    <div class="row mt-3">

        <div class="col-12 text-center p-2 mb-2">
            <h1>Libros de {{$genero->name}} <i class="{{$genero->icon}}"></i></h1>
        </div>

        <!--Primera columna: libros-->
        @include('partials.libros')

        <!--Segunda columna: busqueda, categorias-->
        @include('partials.sidebar')

    </div>
@endsection