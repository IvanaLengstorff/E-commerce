@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h2>Lista de Metodos de Pago</h2>
@stop

@section('content')

    <div class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('paymentMethods.create') }}" class="btn btn-primary my-3">Registrar metodo de pago</a>
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-striped"id="tabla">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paymentMethods as $paymentMethod)
                            <tr>
                                <td>{{ $paymentMethod->id }}</td>
                                <td>{{ $paymentMethod->name }}</td>
                                <td>
                                    <a href="{{ route('paymentMethods.edit', $paymentMethod->id) }}"
                                        class="btn btn-primary">Editar</a>
                                    <form action="{{ route('paymentMethods.destroy', $paymentMethod->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Estas seguro que deseas Eliminar?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @stop

    @section('css')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    @stop

    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#tabla').DataTable();
            });
        </script>
    @stop
