@extends('layouts.main')

@section('contenido')
    <div class="text-center mt-5">
        <h1>Editar libro '{{$libro->title}}'</h1>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-8">
            <div class="card sombra">
                <div class="card-header font-weight-bold text-center">{{ __('Introduce la información del libro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{action("LibrosController@editLibro")}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field("PUT")}}

                        <input type="hidden" name="id" value="{{$libro->id}}">

                        <div class="form-group row">
                            <label for="imagen_caratula" class="col-md-4 col-form-label text-md-right">{{ __('Carátula (opcional)') }}</label>

                            <div class="col-md-6">

                                <input type="file" id="imagen_caratula" name="imagen_caratula" class="form-custom-file @error('imagen_caratula') is-invalid @enderror" value="{{ old('caratula') ? old('caratula') : $libro->cover_img_file}}" accept="image/jpeg, image/png">

                                @error('imagen_caratula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ? old('title') : $libro->title}}" max="255">

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="autor" class="col-md-4 col-form-label text-md-right">{{ __('Autor') }}</label>

                            <div class="col-md-6">
                                <input id="autor" type="text" class="form-control @error('autor') is-invalid @enderror" name="autor" value="{{ old('autor') ? old('autor') : $libro->author}}" max="255">

                                @error('autor')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>

                            <div class="col-md-6">

                                <select name="categoria" id="categoria" class="form-control">
                                    @foreach($generos as $genero)
                                        <option value="{{$genero->id}}" @if(old('categoria') && $genero->id==old('categoria')) selected @elseif(!old('categoria') && $genero->id==$libro->genre->id) selected @endif>{{$genero->name}}</option>
                                    @endforeach
                                </select>

                                @error('categoria')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_pub" class="col-md-4 col-form-label text-md-right" >{{ __('Fecha de publicación') }}</label>

                            <div class="col-md-6">

                                <input type="date"  id="fecha_pub" name="fecha_pub" class="form-control @error('fecha_pub') is-invalid @enderror" value="{{ old('fecha_pub') ? old('fecha_pub') : $libro->publication_date}}">

                                @error('fecha_pub')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sinopsis" class="col-md-12 col-form-label text-center" >{{ __('Sinopsis (máximo 350 caracteres)') }}</label>

                            <div class="col-md-10 m-auto">

                                <textarea id="sinopsis" name="sinopsis" class="form-control @error('sinopsis') is-invalid @enderror" rows="8" maxlength="350">{{ old('sinopsis') ? old('sinopsis') : $libro->synopsis}}</textarea>

                                @error('sinopsis')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="info" class="col-md-12 col-form-label text-center" >{{ __('Información extendida (máximo 500 caracteres)') }}</label>

                            <div class="col-md-10 m-auto">

                                <textarea id="info" name="info" class="form-control @error('info') is-invalid @enderror" value="{{ old('info') }}" rows="8" maxlength="500">{{ old('info') ? old('info') : $libro->expanded_info}}</textarea>

                                @error('info')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Guardar cambios') }}
                                </button>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-3">
        <a href="{{url('admin/panel_libros/listado')}}" class="btn btn-primary">Volver al panel</a>
    </div>

@endsection