@extends('layouts.main')

@section('head')
    <script src="{{asset("assets/js/confirmar_borrado.js")}}"></script>
@endsection

@section('contenido')

    <div class="col-12 text-center mt-5">
        <h1>Gestión de libros <a href="{{url("/admin/panel_libros/crear")}}" class="btn btn-success rounded-circle" data-toggle="tooltip" data-placement="top" title="Agregar libro"><i class="fas fa-plus"></i></a></h1>
    </div>

    <div class="row mt-3">

        <div class="col-12 mh-75 overflow-auto">

            <table class="table table-striped text-center borde sombra " >
                <thead class="encabezado-tablas">
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Categoría</th>
                    <th>Fecha de publicación</th>
                    <th>Fecha de creación</th>
                    <th>Última actualización</th>
                    <th></th>
                    <th></th>
                </thead>

                <tbody>
                @foreach($libros as $libro)
                    <tr>
                        <td class="font-weight-bold">{{$libro->id}}</td>
                        <td>{{$libro->title}}</td>
                        <td>{{$libro->author}}</td>
                        <td>{{$libro->genre->name}}</td>
                        <td>{{$libro->publication_date}}</td>
                        <td>{{$libro->created_at}}</td>
                        <td>{{$libro->updated_at}}</td>
                        <td>
                            <form action="{{action('AdminController@getEditarLibro')}}" method="GET">
                                {{csrf_field()}}

                                <input type="hidden" name="id" value="{{$libro->id}}" >
                                <button type="submit" class="btn btn-sm btn-primary"  data-toggle="tooltip" data-placement="top" title="Editar libro">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{action('LibrosController@deleteLibro')}}" method="POST" class="form_borrado_panel">
                                {{csrf_field()}}
                                {{method_field("DELETE")}}

                                <input type="hidden" name="id" value="{{$libro->id}}" >
                                <button type="submit" name="btn_delete_libro" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="top" title="Borrar libro">
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