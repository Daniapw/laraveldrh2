<div class="col-12 col-md-8 order-1">
    <div class="row">
        @foreach($libros as $libro)
            <div class="col-12 container-libro sombra borde mb-4 p-2">
                <div class="row p-3">
                    <div class="col-12 mb-4">
                        <a href="{{url('/libros/info/'.$libro->id)}}" class="titulo-libro text-break text-wrap">{{$libro->title}} de {{$libro->author}}</a>
                    </div>

                    <div class="col-4">
                        <img class="w-100 shadow-lg" src="{{asset('assets/img/caratulas_libros/'.$libro->cover_img_file)}}">
                    </div>

                    <div class="col-8">
                        <div class="sinopsis-index text-wrap"><p>{{$libro->synopsis}}</p></div>
                        <div class="text-muted etiquetas-libro">
                            <a href="{{url('/categoria/ver/'.$libro->genre->id)}}" class="mb-0"><i class="{{$libro->genre->icon}} mr-1"></i> {{$libro->genre->name}} </a>
                            <p class="mb-0"><i class="fas fa-user mr-1"></i> {{$libro->author}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
