@extends('layouts.main')

@section('head')
    <script src="{{asset("assets/js/confirmar_borrado.js")}}"></script>
@endsection

@section('contenido')

    <div class="col-12 text-center mt-5">
        <h1>Gestión de usuarios</h1>
    </div>

    <div class="row mt-3">

        <div class="col-12 mh-75 overflow-auto">

            <table class="table table-striped text-center borde sombra " >
                <thead class="encabezado-tablas">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Fecha de alta</th>
                    <th>Email confirmado</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td class="font-weight-bold">{{$usuario->id}}</td>
                            <td class="td_nombre">{{$usuario->username}} @if($usuario->id==Auth::user()->id) (tú) @endif</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->role}}</td>
                            <td>{{$usuario->created_at}}</td>
                            <td>@if($usuario->email_verified_at) {{$usuario->email_verified_at}} @else No @endif</td>
                            <td>
                                <form action="{{action('UsuarioController@deleteUsuario')}}" method="POST" class="form_borrado_panel">
                                    {{csrf_field()}}
                                    {{method_field("DELETE")}}

                                    <input type="hidden" name="id" value="{{$usuario->id}}" >
                                    <button type="submit" name="btn_delete_usuario" class="btn btn-sm btn-danger btn_borrar" data-toggle="tooltip" data-placement="top" title="Eliminar usuario"
                                            @if (Auth::user()->id==$usuario->id) disabled @endif >
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