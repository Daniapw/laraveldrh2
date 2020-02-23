@extends('layouts.main')
@section('contenido')

    <div class="row mt-3">

        <div class="col-12 text-center p-2 mb-2">
            <h1>Libros de {{$genero->name}} <i class="{{$genero->icon}}"></i></h1>
        </div>

        @if(count($libros)<=0)
            <div class="col-12 col-md-8 text-center" >
                <p class="text-danger titulo-libro">Parece que aún no tenemos ningún libro registrado en esta categoría, disculpe las molestias <i class="fas fa-frown"></i></p>
            </div>
        @else

            <!--Primera columna: libros-->
            @include('partials.libros')

        @endif

        <!--Segunda columna: busqueda, categorias-->
        @include('partials.sidebar')

    </div>
@endsection