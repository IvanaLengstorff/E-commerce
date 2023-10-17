@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h2>Crear Subcategoria</h2>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('subcategories.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="focus border-primary form-control" id="name" name="name">
                    @error('name')
                        <small class="text-danger">El nombre es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <h5>Categoria:</h5>
                    <select name = "category_id" id="category_id" class="form-control" onchange="habilitar()">
                        <option value="">Seleccione una categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">La Categoria es requerido</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Crear Subcategoria</button>
            </form>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
