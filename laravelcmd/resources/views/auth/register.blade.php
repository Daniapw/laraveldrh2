@extends('layouts.main')

@section('contenido')
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-8">
            <div class="card sombra">
                <div class="card-header font-weight-bold text-center">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de usuario*') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>

                            <div class="col-md-6">

                                <input type="radio" id="sexo" name="sexo" value="hombre" checked> Hombre<br>
                                <input type="radio" name="sexo" value="mujer" > Mujer<br>
                                <input type="radio" name="sexo" value="otro" > Otro<br>

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

                                <input type="date"  id="fecha_nac" name="fecha_nac" class="form-control @error('fecha_nac') is-invalid @enderror" value="{{ old('fecha_nac') }}">

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
                                    <option value="España" {{old('pais')=='España'?'selected':''}}>España</option>
                                    <option value="Portugal" {{old('pais')=='Portugal'?'selected':''}}>Portugal</option>
                                    <option value="Francia" {{old('pais')=='Francia'?'selected':''}}>Francia</option>
                                    <option value="Italia" {{old('pais')=='Italia'?'selected':''}}>Italia</option>
                                    <option value="Alemania" {{old('pais')=='Alemania'?'selected':''}}>Alemania</option>
                                    <option value="Reino Unido" {{old('pais')=='Reino Unido'?'selected':''}}>Reino Unido</option>
                                </select>

                                @error('pais')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>

                            <div class="col-md-12 text-center">
                                <a class="btn btn-link" href="{{ url('/login') }}">
                                    {{ __('¿Ya tienes una cuenta? Inicia sesión.') }}
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
