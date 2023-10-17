@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h2>Editar Cargo</h2>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('workPositions.update', $workPosition->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="focus border-primary form-control" id="name" name="name" value="{{ $workPosition->name }}">
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
