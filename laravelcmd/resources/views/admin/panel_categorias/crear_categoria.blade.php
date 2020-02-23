@extends('layouts.main')

@section('contenido')
<div class="text-center mt-5">
    <h1>Añadir nueva categoría</h1>
</div>

<div class="row justify-content-center mt-3">
    <div class="col-12 col-md-8">
        <div class="card sombra">
            <div class="card-header font-weight-bold text-center">{{ __('Introduce la información de la categoría') }}</div>

            <div class="card-body">
                <form method="POST" action="{{action("CategoriaController@createCategoria")}}">
                {{csrf_field()}}

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre (máx 30 caracteres)') }}</label>

                    <div class="col-md-6">

                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" max="30">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="icono" class="col-md-4 col-form-label text-md-right">{{ __('Icono (opcional)') }}</label>

                    <div class="col-md-6">
                        <input id="icono" type="text" class="form-control @error('icono') is-invalid @enderror" name="icono" value="{{ old('icono') }}" max="30">

                        @error('icono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">
                            {{ __('Añadir') }}
                        </button>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="text-center mt-3">
    <a href="{{url('/admin/panel_categorias/listado')}}" class="btn btn-primary">Volver al panel</a>
</div>

@endsection