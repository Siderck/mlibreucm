@extends('admin.master')

@section('title', 'Editar Usuario')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('admin/users/user_edit') }}"><i class="fas fa-users"></i> Usuarios</a>
</li>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile</div>
                    <div class="card-body">

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        {!! Form::model([$u, 'route' => ['user.update'.$user->rut], 'method' => 'POST']) !!}
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nombres</label>
                                <div class="col-sm-10">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'rut' => 'name']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-10">
                                    {!! Form::text('email', null, ['class' => 'form-control', 'rut' => 'email']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
