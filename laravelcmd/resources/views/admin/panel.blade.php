@extends('layouts.main')
@section('contenido')
    <div class="text-center mt-5">
        <h1>Panel de gestión</h1>
    </div>


    <div class="row mt-5">
        <div class="col-12 col-md-4 mt-3 mt-md-0 text-center contenedor-tarjeta-categoria ">
            <a href="#">
                <div class="tarjeta-categoria borde sombra py-4 px-2">
                    <a href="{{url("/admin/panel_usuarios/listado")}}">
                        <div class="mb-2">
                            <i class="fas fa-user fa-5x"></i>
                        </div>
                        <h3 class="pt-2">Gestionar usuarios</h3>
                    </a>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-4 mt-3 mt-md-0 text-center contenedor-tarjeta-categoria ">
            <a href="#">
                <div class="tarjeta-categoria borde sombra py-4 px-2">
                    <a href="{{url("/admin/panel_libros/listado")}}">
                        <div class="mb-2">
                            <i class="fas fa-book fa-5x"></i>
                        </div>
                        <h3 class="pt-2">Gestionar libros</h3>
                    </a>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-4 mt-3 mt-md-0 text-center contenedor-tarjeta-categoria ">
            <a href="#">
                <div class="tarjeta-categoria borde sombra py-4 px-2">
                    <a href="{{url("/admin/panel_categorias/listado")}}">
                        <div class="mb-2">
                            <i class="fas fa-folder fa-5x"></i>
                        </div>
                        <h3 class="pt-2">Gestionar categorías</h3>
                    </a>
                </div>
            </a>
        </div>

    </div>
@endsection
