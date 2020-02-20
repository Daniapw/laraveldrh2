@extends('layouts.main')
@section('contenido')

    <div class="row mt-3">

        <!--Segunda columna: busqueda, categorias-->
        @include('partials.sidebar')

        <!--Primera columna: libros-->
        <div class="col-12">
            <div class="row">

                <div class="col-12 text-center p-2">
                    <h1>Resultado de la búsqueda '{{$q}}'</h1>
                </div>


                <!--Primera columna: libros-->
                @include('partials.libros')
            </div>
        </div>


    </div>
@endsection