@extends('adminlte::page')

@section('title', 'Sucursales')

@section('content_header')
    <h1>Registrar Sucursal</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('branches.store') }}" novalidate>
                @csrf
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="name">
                    @error('name')
                        <small class="text-danger">El nombre es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Direccion</label>
                    <input type="text" class="form-control" name="address">
                    @error('address')
                        <small class="text-danger">El campo es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Telefono</label>
                    <input type="text" class="form-control" name="phone">
                    @error('phone')
                        <small class="text-danger">El Telefono es requerido</small>
                    @enderror
                </div>

                <button class="btn btn-danger btn-sm" type="submit">Registrar</button>

                <a href="{{ route('branches.index') }}"class="btn btn-warning text-white btn-sm">Volver</a>
            </form>

        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
