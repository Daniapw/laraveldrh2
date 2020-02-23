@extends('layouts.main')

@section('head')
    <script src="{{asset("assets/js/confirmar_borrado.js")}}"></script>
@endsection

@section('contenido')

    <div class="col-12 text-center mt-5">
        <h1>Gestión de categorías <a href="{{url("/admin/panel_categorias/crear")}}" class="btn btn-success rounded-circle"><i class="fas fa-plus"></i></a></h1>
    </div>

    <div class="row mt-3">

        <div class="col-12 mh-75 overflow-auto">

            <table class="table table-striped text-center borde sombra " >
                <thead class="encabezado-tablas">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Icono FA</th>
                    <th>Número de libros en esta categoría</th>
                    <th>Fecha de creación</th>
                    <th>Última actualización</th>
                    <th></th>
                    <th></th>
                </thead>

                <tbody>
                @foreach($generos as $genero)
                    <tr>
                        <td class="font-weight-bold">{{$genero->id}}</td>
                        <td>{{$genero->name}}</td>
                        <td> <i class="{{$genero->icon}} fa-lg" data-toggle="tooltip" data-placement="top" title="{{$genero->icon}}"></i></td>
                        <td>{{$genero->books()->count()}}</td>
                        <td>{{$genero->created_at}}</td>
                        <td>{{$genero->updated_at}}</td>
                        <td>
                            <form action="{{action('AdminController@getEditarCategoria')}}" method="GET">
                                {{csrf_field()}}

                                <input type="hidden" name="id" value="{{$genero->id}}" >
                                <button type="submit" class="btn btn-sm btn-primary"  data-toggle="tooltip" data-placement="top" title="Editar categoría">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{action('CategoriaController@deleteCategoria')}}" method="POST" class="form_borrado_panel">
                                {{csrf_field()}}
                                {{method_field("DELETE")}}

                                <input type="hidden" name="id" value="{{$genero->id}}" >

                                <button type="submit" name="btn_delete_categoria" class="btn btn-sm btn-danger btn_borrar" data-toggle="tooltip" data-placement="top" title="Eliminar categoría">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <div class="text-center">
        <a href="{{url('/admin/panel')}}" class="btn btn-primary">Volver al panel</a>
    </div>
@endsection