@extends('layouts.main')
@section('contenido')
    <div class="row mt-3">
        @foreach($generos as $genero)

            <div class="col-6 col-md-3 p-3 text-center">
                <div class="tarjeta-categoria shadow bg-white py-4">
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