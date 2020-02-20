@extends('layouts.secondary')
@section('contenido')
    <div class="row mt-3 m-md-5">

        <!--Primera columna: informacion del libro y reviews-->
        <div class="col-12 col-md-8">
            <div class="row">
                <div class="col-12 container-libro borde sombra mb-3 p-2">
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

                            <div class="text-center mt-3">
                                @if(!Auth::user()->books->contains($libro->id))
                                    <form action="{{action('LibrosController@putFavorito', $libro->id)}}" method="POST">
                                        {{method_field('PUT')}}
                                        {{csrf_field()}}
                                        <button	type="submit" class="btn btn-outline-danger" style="display:inline">
                                            <i class="fas fa-heart"></i> Agregar a favoritos
                                        </button>
                                    </form>
                                @else
                                    <form action="{{action('LibrosController@deleteFavorito', $libro->id)}}" method="POST">
                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}
                                        <button	type="submit" class="btn btn-outline-primary" style="display:inline">
                                            <i class="fas fa-heart-broken"></i> Quitar de favoritos
                                        </button>
                                    </form>
                                @endif
                            </div>
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
                                        <a href="{{url('/categoria/ver/'.$libro->genre->id)}}" class="mb-0"><i class="{{$libro->genre->icon}} mr-1"></i> {{$libro->genre->name}} </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!--Reviews-->
                <div class="col-12 p-0 mt-3 bg-white ">

                    <div class="text-center">
                        <h3 class="font-weight-bold">Opiniones</h3>
                    </div>

                    <div class="bg-gris overflow-auto mh-75 borde sombra">
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