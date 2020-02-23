@extends('layouts.main')
@section('contenido')
    <div class="text-center mt-5">
        <h1>Tu perfil</h1>
    </div>

    <!--INFORMACION-->
    <div class="row borde sombra mt-3 mx-2 mx-md-0">

        <!--Columna izquierda-->
        <aside class="col-12 col-md-3 " >

            <div class="row h-100 border-right ">
                <!--Imagen-->
                <div class="col-12 text-center p-3">

                    <div>
                        <img class="w-100 rounded-circle shadow" src="{{url('assets/img/img_usuarios/'.Auth::user()->profile_img_file)}}" >
                    </div>
                </div>

                <!--Nombre del usuarioPerfil-->
                <div class="col-12 text-center p-2">
                    <div>
                        <h3 class="font-weight-bold">{{Auth::user()->username}}</h3>
                    </div>
                </div>
            </div>

        </aside>

        <!--Columna derecha-->
        <!--Informacion del usuarioPerfil-->
        <div class="col-12 col-md-9 filaInformacionPerfil">

            <!--Nombre-->
            <div class="row border-bottom border-top py-2">

                <div class="col-12 col-md-4 text-center text-md-left ">
                    <div class="info">
                        <h5 class="font-weight-bold p-2 m-0 m-0">Correo electrónico</h5>
                    </div>
                </div>

                <div class="col-12 col-md-8 text-center text-md-left">
                    <div class="info">
                        <p class="p-2 m-0">{{Auth::user()->email}}</p>
                    </div>
                </div>

            </div>

            <!--Apellidos-->
            <div class="row py-2 py-2">

                <div class="col-12 col-md-4 text-center text-md-left">
                    <div class="info">
                        <h5 class="font-weight-bold p-2 m-0">Fecha de nacimiento</h5>
                    </div>
                </div>

                <div class="col-12 col-md-8 text-center text-md-left">
                    <div class="info">
                        <p class="p-2 m-0">{{Auth::user()->date_of_birth}}</p>
                    </div>
                </div>

            </div>

            <!--Fecha de nacimiento-->
            <div class="row border-bottom border-top py-2">

                <div class="col-12 col-md-4 text-center text-md-left">
                    <div class="info">
                        <h5 class="font-weight-bold p-2 m-0">Sexo</h5>
                    </div>
                </div>

                <div class="col-12 col-md-8 text-center text-md-left">
                    <div class="info">
                        <p class="p-2 m-0">{{Auth::user()->sex}}</p>
                    </div>
                </div>
            </div>

            <!--Correo-->
            <div class="row border-bottom border-top py-2">

                <div class="col-12 col-md-4 text-center text-md-left">
                    <div class="info">
                        <h5 class="font-weight-bold p-2 m-0">País</h5>
                    </div>
                </div>

                <div class="col-12 col-md-8 text-center text-md-left">
                    <div class="info">
                        <p class="p-2 m-0">{{Auth::user()->country}}</p>
                    </div>
                </div>

            </div>

            <!--Pais-->
            <div class="row border-bottom border-top py-2">

                <div class="col-12 col-md-4 text-center text-md-left">
                    <div class="info">
                        <h5 class="font-weight-bold p-2 m-0">Código Postal</h5>
                    </div>
                </div>

                <div class="col-12 col-md-8 text-center text-md-left">
                    <div class="info">
                        <p class="p-2 m-0">@if(Auth::user()->postal_code) {{Auth::user()->postal_code}} @else N/D @endif</p>
                    </div>
                </div>
            </div>

            <!--Codigo postal-->
            <div class="row border-bottom border-top py-2">

                <div class="col-12 col-md-4 text-center text-md-left">
                    <div class="info">
                        <h5 class="font-weight-bold p-2 m-0">Teléfono</h5>
                    </div>
                </div>

                <div class="col-12 col-md-8 text-center text-md-left">
                    <div class="info">
                        <p class="p-2 m-0">@if(Auth::user()->phone_number) {{Auth::user()->phone_number}} @else N/D @endif</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection