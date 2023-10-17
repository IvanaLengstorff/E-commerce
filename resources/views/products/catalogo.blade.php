@extends('adminlte::page')

@section('title', 'Catálogo de Productos')

@section('content_header')
    <h1>Catálogo de Productos</h1>
@stop

@section('content')
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset($product->image_path) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Precio: ${{ $product->price }}</p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
