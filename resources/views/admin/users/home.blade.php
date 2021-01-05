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
        <style>
            table, th, td {
            border-bottom: 1px solid black;
            border-top: 1px solid black;
            border-collapse: collapse;
            }
            th, td {
            padding: 15px;
            text-align: left;
            height: 50px;
            }
            #t01 {
            width: 100%;
            }
        </style>
            <table class="table" id="t01">
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

                        @if ($user->tipousuario != 0)
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
                                @if ($user->tipousuario === 2)
                                    <a href="{{ url('admin/user/'.$user->rut.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a>
                                        <form action="{{ route('user.delete', [$user->rut]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('¿Está seguro que desea eliminar a este usuario?')" type="submit">Eliminar</button>
                                        </form>
                                    </a>
                                @endif
                                </div>
                            </td>
                        @endif

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
