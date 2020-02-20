@extends('layouts.main')

@section('contenido')
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-8">
            <div class="card shadow">
                <div class="card-header text-center font-weight-bold">{{ __('Verifique su correo electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha vuelto a enviar el mensaje de verificación a su dirección de correo electrónico') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder necesita verificar su correo electrónico.') }}
                    {{ __('Si no ha recibido el email de verificación') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('haga click aquí para que se envíe otro') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
