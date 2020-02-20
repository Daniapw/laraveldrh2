@extends('layouts.main')
@section('contenido')
    <div class="row mt-5">
        <div class="col-12">
            <h1>Selecciona una categoría para ver los libros de ese género</h1>
        </div>
        @foreach($generos as $genero)

            <div class="col-6 col-md-3 p-3 text-center contenedor-tarjeta-categoria ">
                <div class="tarjeta-categoria borde sombra py-4">
                    <a href="{{url("/categoria/ver/".$genero->id)}}">
                        <div class="mb-2">
                            <i class="{{$genero->icon}} fa-3x"></i>
                        </div>
                        <h3>{{$genero->name}}</h3>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection