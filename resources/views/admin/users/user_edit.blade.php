@extends('admin.master')

@section('title', 'Editar Usuarios')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('admin/users') }}"><i class="fas fa-users"></i> Usuarios</a>
</li>
@endsection


@section('content')
<div class = "box box_register shadow">
    <div class="header">
        <a href="{{ url('/') }}">
            <img src="{{ url('/static/images/logo.png') }}">
        </a>
    </div>
    <div class="inside">
    {!! Form::open(['url' => 'admin/user/'.$u->rut.'/edit'] ) !!}
        <p class="text-center fs-3" >Modificar datos</p>

        <label for="name">Nombres:</label>
        <div class="input-group" >
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px" ><i class="fas fa-user"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::text('name', $u->nombres, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="rut" class = "mtop16">RUT:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-address-card"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::text('rut', $u->rut, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="apellidos" class = "mtop16">Apellidos:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-user-tag"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::text('apellidos', $u->apellidos, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="email" class = "mtop16">Correo:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="far fa-envelope"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::email('email', $u->correo, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="telefono" class = "mtop16">Teléfono:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-mobile-alt"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::text('telefono', $u->telefono, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="direccion" class = "mtop16">Dirección:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-map-marked-alt"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::text('direccion', $u->dirección, ['class' => 'form-control', 'required']) !!}
        </div>
        @if(Session::has('message'))
            <div class = "container">
                <div class = "alert alert-{{ Session::get('typealert') }}" style = "display:none;">
                    {{ Session::get('message') }}
                    @if ($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <script>
                        $('.alert').slideDown();
                        setTimeout(function(){ $('.alert').slideUp(); }, 10000);
                    </script>
                </div>
            </div>
        @endif
    {{ Form::submit('Modificar Datos', ['class' => 'btn btn-primary mtop16']) }}
    {!! Form::close() !!}

</div>
@stop