@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h2>Crear Productos</h2>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="focus border-primary form-control" id="name" name="name">
                    @error('name')
                        <small class="text-danger">El nombre es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Descripcion:</label>
                    <input type="text" class="focus border-primary form-control" id="name" name="description">
                    @error('description')
                        <small class="text-danger">El nombre es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Precio:</label>
                    <input type="number" class="focus border-primary form-control" id="name" name="price">
                    @error('price')
                        <small class="text-danger">El precio es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Costo:</label>
                    <input type="number" class="focus border-primary form-control" id="name" name="cost_avg">
                    @error('cost_avg')
                        <small class="text-danger">El costo es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Stock:</label>
                    <input type="number" class="focus border-primary form-control" id="name" name="stock">
                    @error('stock')
                        <small class="text-danger">El stock es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <h5>SubCategoria:</h5>
                    <select name = "subcategory_id" id="subcategory_id" class="form-control">
                        <option value="">Seleccione una subcategoria</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">
                                {{ $subcategory->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('subcategory_id')
                        <small class="text-danger">La subCategoria es requerido</small>
                    @enderror
                </div>
                <div class="form-group">
                    <h5>Marcas:</h5>
                    <select name = "brand_id" id="brand_id" class="form-control">
                        <option value="">Seleccione una marca</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <small class="text-danger">La marca es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <h5>Imagen del Producto:</h5>
                    <input type="file" name="imagen" id="imagen" class="form-control-file" required>
                    @error('imagen')
                        <small class="text-danger">La imagen es requerido</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>

    </div>
@stop

@section('css')
@stop

@section('js')
@stop
