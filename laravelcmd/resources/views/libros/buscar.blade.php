@extends('layouts.main')
@section('contenido')


    <div class="col-12 text-center mt-3">
        <h1>Resultado de la búsqueda '{{$q}}'</h1>
    </div>

    <div class="row mt-3">

        <!--Primera columna: libros-->
        <div class="col-12 col-md-8">
            <div class="row">

                @if(count($libros)>0)
                    @include('partials.libros')
                @else
                    <div class="col-12 text-danger">
                        <p>No se ha encontrado ningún libro que coincida con ese término de búsqueda</p>
                    </div>
                @endif

            </div>
        </div>

        <!--Segunda columna: busqueda, categorias-->
        @include('partials.sidebar')


    </div>
@endsection