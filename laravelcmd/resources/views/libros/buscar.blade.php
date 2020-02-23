@extends('layouts.main')
@section('contenido')


    <div class="col-12 text-center mt-3">
        <h1>Resultado de la búsqueda '{{$q}}'</h1>
    </div>

    <div class="row mt-3">

        <!--Primera columna: libros-->

        @if(count($libros)>0)
            @include('partials.libros')
        @else
            <div class="col-12 col-md-8 text-danger titulo-libro text-center">
                <p>Lo sentimos, no hemos podido encontrar ningún libro que coincida con ese término de búsqueda <i class="fas fa-frown"></i></p>
            </div>
        @endif


        <!--Segunda columna: busqueda, categorias-->
        @include('partials.sidebar')


    </div>
@endsection