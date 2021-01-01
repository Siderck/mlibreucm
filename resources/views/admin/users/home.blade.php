@extends('admin.master')

@section('title', 'Usuarios')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('admin/users') }}"><i class="fas fa-users"></i> Usuarios</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-users"></i> Usuarios</h2>
        </div>
        <div class="inside">
            <table class="table">
                <thead>
                    <tr>
                        <td>RUT</td>
                        <td>Nombres</td>
                        <td>Apellidos</td>
                        <td>Tipo de usuario</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->rut }}</td>
                        <td>{{ $user->nombres }}</td>
                        <td>{{ $user->apellidos }}</td>
                        <td>
                            @if ($user->tipousuario === 1)
                                Usuario Interno
                            @else
                                Usuario Externo
                            @endif
                        </td>
                        <td>
                            <div class="opts">
                            <a href="{{ url('admin/user/'.$user->rut.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ url('admin/user/'.$user->rut.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
