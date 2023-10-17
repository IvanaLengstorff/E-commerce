@extends('adminlte::page')

@section('title', 'Catálogo de Productos')

@section('content_header')
    <h1>Catálogo de Productos</h1>
@stop

@section('content')
    <div class="row">
        @foreach ($productos as $producto)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('img/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text">Precio: ${{ $producto->precio }}</p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
