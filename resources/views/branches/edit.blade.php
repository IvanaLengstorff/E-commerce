@extends('adminlte::page')

@section('title', 'Sucursales')

@section('content_header')
    <h1>Editar Sucursal</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('branches.update', $branch) }}" novalidate>

                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="">Nombre</label>
                    <input value="{{ $branch->name }}" type="text" class="form-control" name="name">
                    @error('name')
                        <small class="text-danger">El nombre es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Direccion</label>
                    <input value="{{ $branch->address }}" type="text" class="form-control" name="address">
                    @error('address')
                        <small class="text-danger">El correo es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Telefono</label>
                    <input value="{{ $branch->phone }}" type="text" class="form-control" name="phone">
                    @error('phone')
                        <small class="text-danger">El telefono es requerido</small>
                    @enderror
                </div>

                <button class="btn btn-danger btn-sm" type="submit">Guardar</button>
                <a href="{{ route('branches.index') }}"class="btn btn-warning text-white btn-sm">Volver</a>
            </form>

        </div>
    </div>
@stop
