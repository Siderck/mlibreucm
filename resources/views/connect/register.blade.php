@extends('connect.master')

@section('title', 'Registrarse')

@section('content')
<div class = "box box_register shadow">
    <div class="header">
        <a href="{{ url('/') }}">
            <img src="{{ url('/static/images/logo.png') }}">
        </a>
    </div>
    <div class="inside">
        {!! Form::open(['url' => '/register']) !!}
        <p class="text-center fs-3" >Completa tus datos</p>

        <label for="email">Nombres:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-user"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <label for="rut" class = "mtop16">RUT:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-address-card"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::text('rut', null, ['class' => 'form-control']) !!}
        </div>

        <label for="apellidos" class = "mtop16">Apellidos:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-user-tag"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
        </div>

        <label for="email" class = "mtop16">Correo:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="far fa-envelope"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>

        <label for="telefono" class = "mtop16">Teléfono:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-mobile-alt"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
        </div>

        <label for="direccion" class = "mtop16">Dirección:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-map-marked-alt"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
        </div>

        <label for="contrasena" class = "mtop16">Contraseña:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-key"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        <label for="ccontrasena" class = "mtop16">Confirmar Contraseña:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-key"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        {{ Form::submit('Registrarse', ['class' => 'btn btn-primary mtop16']) }}
        {!! Form::close() !!}
        <div class="footer mtop16">
            <a href="{{ url('/login') }}" class="btn btn-secondary">Ya tengo una cuenta, Ingresar</a>
        </div>
    </div>

</div>
@stop
