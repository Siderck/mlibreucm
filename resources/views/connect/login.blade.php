@extends('connect.master')

@section('title', 'Login')

@section('content')
<div class = "box box_login shadow">
    <div class="header">
        <a href="{{ url('/') }}">
            <img src="{{ url('/static/images/logo.png') }}">
        </a>
    </div>
    <div class="inside">
        {!! Form::open(['url' => '/login']) !!}
        <label for="email">Correo electrónico:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="far fa-envelope"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>

        <label for="email" class = "mtop16">Password:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text" style = "font-size: 24px"><i class="fas fa-key"></i></div> {{-- Icono de eMail usando FontAwesome --}}
            </div>
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        {{ Form::submit('Ingresar', ['class' => 'btn btn-success mtop16']) }}
        {!! Form::close() !!}

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

        <div class="footer mtop16">
            <a href="{{ url('/register') }}" class="btn btn-secondary">Registrarse</a>
        </div>
    </div>

</div>
@stop
