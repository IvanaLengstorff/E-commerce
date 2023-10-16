@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')

@section('content')
<div class="container">
    <h2>Edit Brand</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('brands.update', $brand->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Brand</button>
    </form>
</div>


@stop

@section('css')
@stop

@section('js')
@stop
