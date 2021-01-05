@extends('admin.master')

@section('title', 'Agregar Producto')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ url('admin/products') }}"><i class="fas fa-boxes"></i> Productos</a>
</li>
<li class="breadcrumb-item">
    <a href="{{ url('admin/product/add') }}"><i class="fas fa-plus"></i> Agregar Producto</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-plus"></i> Agregar Producto</h2>
        </div>
        <div class="inside" >
            {!! Form::open(['url' => '/admin/product/add']) !!}
            <div class="row ">
                <div class="col-md-8">
                    <div class="row mtop16">
                        <div class="col-md-3"></div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        Precio:
                                    </span>
                            </div>
                            {!! Form::number('price', null, ['class' => 'form-control', 'min' => '0.00', 'step' => 'any']) !!}
                        </div>
                    </div>

                    <div class="input-group mtop16">
                        <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    Nombre del producto:
                                </span>
                        </div>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="input-group mtop16">
                        <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    Características:
                                </span>
                        </div>
                        {!! Form::text('caracteristicas', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="row mtop16">
                        <div class="col-md-32">
                            <label for="content">Descripción</label>
                            {!! Form::text('content', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>



                    <div class="row mtop16">
                        <div class="col-md-32">
                            <label for="content">Categoria</label>
                            {!! Form::text('categoria', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>



                </div>
            </div>



            <div class="row mtop16">
                <div class="col-md-3">
                    <label for="name">Imagen:</label>
                    <div class="custom-file">
                        {!! Form::file('img', ['class' => 'custom-file-input', 'id' => 'customFile']) !!}
                        <label for="" class="custom-file-label mtop16" for = "customFile">             </label>
                    </div>
                </div>
            </div>

            <div class="row mtop16">
                        <div class="col-md-32">
                            <label for="content">Stock</label>
                            {!! Form::text('stock', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

            <div class="row mtop16">
            </div>

            {{ Form::submit('Publicar', ['class' => 'btn btn-primary mtop16']) }}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
