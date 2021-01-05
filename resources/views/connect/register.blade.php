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
        @if ($_SESSION['val'] != "0")
            <p class="text-center fs-3" >Completa tus datos</p>
        @else
            <p class="text-center fs-3" >Registrar usuario</p>
        @endif
        <label for="name">Nombres:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-user"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="rut" class = "mtop16">RUT:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-address-card"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::text('rut', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="apellidos" class = "mtop16">Apellidos:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-user-tag"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::text('apellidos', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="email" class = "mtop16">Correo:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="far fa-envelope"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="telefono" class = "mtop16">Teléfono:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-mobile-alt"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::text('telefono', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="direccion" class = "mtop16">Dirección:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-map-marked-alt"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::text('direccion', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="password" class = "mtop16">Contraseña:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-key"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="cpassword" class = "mtop16">Confirmar Contraseña:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-key"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::password('cpassword', ['class' => 'form-control', 'required']) !!}
        </div>

        @if ($_SESSION['val'] != "0")
            {{ Form::submit('Registrarse', ['class' => 'btn btn-primary mtop16']) }}
            {!! Form::close() !!}
        @else
        {{ Form::submit('Registrar', ['class' => 'btn btn-primary mtop16']) }}
            {!! Form::close() !!}
        @endif

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

        @if ($_SESSION['val'] != "0")
            <div class="footer mtop16">
                <a href="{{ url('/login') }}" class="btn btn-secondary">Ya tengo una cuenta, Ingresar</a>
            </div>
        @else
            <div class="footer mtop16">
                <a href="{{ url('/admin') }}" class="btn btn-secondary">Volver al menú de administrador</a>
            </div>
        @endif
    </div>

</div>
@stop
