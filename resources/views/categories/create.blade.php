@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h2>Crear Categoria </h2>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('categories.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="focus border-primary form-control" id="name" name="name">
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">Crear Categoria</button>
            </form>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
