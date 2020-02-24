@extends('layouts.secondary')

@section('head')
    <script src="{{url(asset('assets/js/editar_review.js'))}}"></script>
@endsection

@section('contenido')
    <div class="row mt-3 m-md-5">

        <!--Primera columna: informacion del libro y reviews-->
        <div class="col-12 col-md-8 order-1">
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
                                <!--Si el usuario esta logeado podra agregar o quitar el libro de su lista de favoritos-->
                                @if(Auth::check())
                                    @if(!Auth::user()->books->contains($libro->id))
                                        <form action="{{action('InfoController@post', $libro->id)}}" method="POST">
                                            {{csrf_field()}}

                                            <button	type="submit" class="btn btn-outline-danger" name="btn_post_fav">
                                                <i class="fas fa-heart"></i> Agregar a favoritos
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{action('InfoController@delete', $libro->id)}}" method="POST">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}

                                            <button	type="submit" class="btn btn-outline-primary" name="btn_delete_fav">
                                                <i class="fas fa-heart-broken"></i> Quitar de favoritos
                                            </button>
                                        </form>
                                    @endif
                                @else
                                    <a href="{{url('/login')}}" class="btn btn-outline-danger"> <i class="fas fa-heart"></i> Agregar a favoritos </a>
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

                <!--Escribir o modificar opinion-->
                @if(Auth::check())
                    @if($review_usuario==false)
                        <div class="col-12 p-0 mt-3 ">

                            <div class="text-center">
                                <h3 class="font-weight-bold">¿Has leído este libro? Deja tu opinión:</h3>
                            </div>

                            <div class="mt-3 sombra borde ">
                                <div class="p-3">

                                    <div class="pt-2">
                                        <form method="POST" action="{{action('InfoController@post', $libro->id)}}">
                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" maxlength="280" rows="7" required>

                                                </textarea>
                                                @error('content')
                                                    <span class="invalid-feedback text-center" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group text-center">
                                                <input type="submit" class="btn btn-primary" value="Enviar" name="btn_post_review">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-12 p-0 mt-3 ">

                            <div class="text-center">
                                <h3 class="font-weight-bold">Tu opinión</h3>
                            </div>

                            <div class="mt-3 borde sombra">
                                <span class="text-right ">
                                    <form method="POST" action="{{action('InfoController@delete', $libro->id)}}">
                                        {{csrf_field()}}
                                        {{method_field("DELETE")}}

                                        <button type="submit" name="btn_delete_review" class="btn btn-danger mt-2 mr-2">
                                            <i class="fas fa-trash-alt"></i> Borrar
                                        </button>
                                    </form>
                                </span>

                                <div class="p-3 mt-4">
                                    <div class="bg-gris overflow-auto mh-75">

                                        <!--Contenido review-->
                                        <p class="font-weight-bold mb-1"><img src="{{asset("assets/img/img_usuarios/".Auth::user()->profile_img_file)}}" class="mr-1 rounded-circle" width="30px" alt="">Tú</p>

                                        <span id="review-usuario">
                                            <p class="text-muted fecha-valoracion">{{$review_usuario->updated_at}}</p>

                                            <div class="p-4 border text-break text-wrap">
                                                <p id="texto_review_original">{{$review_usuario->content}}</p>

                                            </div>
                                        </span>

                                        <!--Form cambiar review-->
                                        <span id="form-review" class="d-none">
                                            <p class="text-center text-muted mb-0">Máx: 280 caracteres</p>
                                            <form method="POST" action="{{action('InfoController@put', $libro->id)}}">
                                                {{csrf_field()}}
                                                {{method_field("PUT")}}

                                                <div class="form-group">
                                                    <textarea class="form-control @error('content_editar') is-invalid @enderror" name="content_editar" maxlength="280" rows="7" id="texto_review_editar" required>

                                                    </textarea>

                                                    @error('content_editar')
                                                        <span class="invalid-feedback text-center" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>

                                                <div class="form-group text-center">
                                                    <input type="submit" class="btn btn-success" value="Enviar" name="btn_put_review">
                                                </div>
                                            </form>
                                        </span>
                                    </div>

                                    <div class="text-center pt-2">
                                        <button class="btn btn-primary" id="editar_review"><i id="icono-btn-editar" class="fas fa-edit"></i> <span id="texto-boton">Editar</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                @endif

                <!--Opiniones-->
                    <div class="col-12 p-0 mt-5 bg-white ">

                        <div class="text-center">
                            <h3 class="font-weight-bold">Opiniones de los usuarios</h3>
                        </div>

                        <div class="bg-gris overflow-auto mh-75 borde sombra">

                            @if(!Auth::check())
                                <div class="text-center mt-3">
                                    <h5>
                                        <a href="{{url("/login")}}" class="font-weight-bold">¿Quieres compartir tu opinión sobre este libro? Inicia sesión o regístrate aquí</a>
                                    </h5>
                                </div>
                            @endif

                        @if(count($reviews)>0)
                            @foreach($reviews as $review)
                                <div class="p-3 mt-4">
                                    <p class="font-weight-bold mb-1"><img src="{{asset("assets/img/img_usuarios/".$review->user->profile_img_file)}}" class="mr-1 rounded-circle" width="30px" alt=""> {{$review->user->username}}</p>
                                    <p class="text-muted fecha-valoracion">{{$review->updated_at}}</p>

                                    <div class="p-4 border text-break text-wrap">
                                        <p>{{$review->content}}</p>
                                    </div>
                                </div>
                            @endforeach

                        @else
                            <div class="p-3 mt-2 text-center">
                                <h4>No hay opiniones para este libro</h4>
                            </div>
                        @endif
                        </div>
                    </div>

            </div>
        </div>

        <!--Segunda columna: busqueda, categorias-->
        @include('partials.sidebar')

    </div>
@endsection