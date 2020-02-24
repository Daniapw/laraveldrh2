@extends('layouts.main')

@section('head')
    <script src="{{asset('assets/js/tooltips.js')}}"></script>
@endsection

@section('contenido')
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-8">
            <div class="card sombra">
                <div class="card-header font-weight-bold text-center">{{ __('Editar información del perfil') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{action("UsuarioController@putUsuario")}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}

                        <div class="form-group row">
                            <label for="imagen_perfil" class="col-md-4 col-form-label text-md-right">{{ __('Imagen de perfil (opcional, máximo 300x300 px)') }}</label>

                            <div class="col-md-6">

                                <input type="file" id="imagen_perfil" name="imagen_perfil" class="form-custom-file @error('imagen_perfil') is-invalid @enderror" value="{{ old('imagen_perfil') }}" accept="image/jpeg, image/png">

                                @error('imagen_perfil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>


                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de usuario') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') ? old('username') : Auth::user()->username}}" autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>

                            <div class="col-md-6">
                                <input type="radio" id="sexo" name="sexo" value="hombre" @if(strcasecmp (Auth::user()->sex, "Hombre" )==0) checked @endif> Hombre<br>
                                <input type="radio" name="sexo" value="mujer" @if(strcasecmp (Auth::user()->sex, "Mujer" )==0) checked @endif> Mujer<br>
                                <input type="radio" name="sexo" value="otro" @if(strcasecmp (Auth::user()->sex, "Otro" )==0) checked @endif> Otro<br>

                                @error('sexo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_nac" class="col-md-4 col-form-label text-md-right" >{{ __('Fecha de nacimiento') }}</label>

                            <div class="col-md-6">

                                <input type="date"  id="fecha_nac" name="fecha_nac" class="form-control @error('fecha_nac') is-invalid @enderror" value="{{ old('fecha_nac') ? old('fecha_nac') : Auth::user()->date_of_birth}}">

                                @error('fecha_nac')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pais" class="col-md-4 col-form-label text-md-right">{{ __('País') }}</label>

                            <div class="col-md-6">

                                <select name="pais" class="form-control" id="pais">
                                    <option value="España" {{Auth::user()->country=='España'?'selected':''}}>España</option>
                                    <option value="Portugal" {{Auth::user()->country=='Portugal'?'selected':''}}>Portugal</option>
                                    <option value="Francia" {{Auth::user()->country=='Francia'?'selected':''}}>Francia</option>
                                    <option value="Italia" {{Auth::user()->country=='Italia'?'selected':''}}>Italia</option>
                                    <option value="Alemania" {{Auth::user()->country=='Alemania'?'selected':''}}>Alemania</option>
                                    <option value="Reino Unido" {{Auth::user()->country=='Reino Unido'?'selected':''}}>Reino Unido</option>
                                </select>

                                @error('pais')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono (opcional)') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') ? old('telefono') : Auth::user()->phone_number}}">

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="codigo_postal" class="col-md-4 col-form-label text-md-right">{{ __('Código postal (opcional)') }}</label>

                            <div class="col-md-6">

                                <input type="text"  id="codigo_postal" name="codigo_postal" class="form-control @error('codigo_postal') is-invalid @enderror" value="{{ old('codigo_postal') ? old('codigo_postal') : Auth::user()->postal_code}}">

                                @error('codigo_postal')
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
        <a href="{{url('/usuario/perfil')}}" class="btn btn-danger">Cancelar</a>
    </div>

@endsection