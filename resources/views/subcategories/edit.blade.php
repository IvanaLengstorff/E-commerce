@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h2>Editar Subcategoria</h2>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('subcategories.update', $subcategory->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="focus border-primary form-control" id="name" name="name"
                        value="{{ $subcategory->name }}">
                    @error('name')
                        <small class="text-danger">El nombre es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <h5>Categoria:</h5>
                    <select name = "category_id" id="category_id" class="form-control" onchange="habilitar()">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">La Categoria es requerido</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>

    </div>
@stop

@section('css')
@stop

@section('js')
@stop
