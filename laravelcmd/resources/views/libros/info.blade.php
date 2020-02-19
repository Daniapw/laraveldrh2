@extends('layouts.main')
@section('contenido')
    <div class="row mt-3">

        <!--Primera columna: informacion del libro y reviews-->
        <div class="col-12 col-md-8">
            <div class="row">
                <div class="col-12 bg-white mb-3 p-2">
                    <div class="row p-3">
                        <div class="col-12 mb-4">
                            <h1 class="font-weight-bold titulo-libro text-break text-wrap">{{$libro->title}} de {{$libro->author}}</h1>
                        </div>

                        <div class="col-8">
                            <div class="sinopsis-index text-wrap text-break"><p>{{$libro->synopsis}}</p></div>
                            <div class="text-wrap text-break"><p>{{$libro->expanded_info}}</p></div>
                        </div>

                        <div class="col-4">
                            <img class="w-100" src="{{asset('assets/img/caratulas_libros/'.$libro->cover_img_file)}}">
                        </div>

                        <div class="col-12 mt-5">
                            <p class="font-weight-bold">Información del libro:</p>

                            <table class="table table-striped border">
                                <tr>
                                    <th>Autor</th>
                                    <td>{{$libro->author}}</td>
                                </tr>
                                <tr>
                                    <th>Fecha de publicación</th>
                                    <td>{{$libro->publication_date}}</td>
                                </tr>
                                <tr>
                                    <th>Categoría</th>
                                    <td>
                                        <a href="{{url('/categoria/'.$libro->genre->id)}}" class="mb-0"><i class="{{$libro->genre->icon}} mr-1"></i> {{$libro->genre->name}} </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!--Reviews-->
                <div class="col-12 p-0">

                    <div class="text-center">
                        <h3>Valoraciones</h3>
                    </div>

                    <div class="bg-white overflow-auto mh-75">
                        @foreach($reviews as $review)
                            <div class="p-3 mt-4">
                                <p class="font-weight-bold mb-1">{{$review->user->username}} ({{$review->user->email}})</p>
                                <p class="text-muted fecha-valoracion">{{$review->created_at}}</p>

                                <div class="p-4 border text-break text-wrap">
                                    <p>{{$review->content}}</p>

                                    <div class="text-center">
                                        <p class="mb-0">{{$review->score}}/5</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

        <!--Segunda columna: busqueda, categorias-->
        @include('partials.sidebar')

    </div>
@endsection