@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h2>Lista de Cargos de la empresa</h2>
@stop

@section('content')

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('workPositions.create') }}" class="btn btn-primary my-3">Registrar Cargo</a>

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-striped" id="tabla">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($workPositions as $workPosition)
                            <tr>
                                <td>{{ $workPosition->id }}</td>
                                <td>{{ $workPosition->name }}</td>
                                <td>
                                    <a href="{{ route('workPositions.edit', $workPosition->id) }}"
                                        class="btn btn-primary">Editar</a>
                                    <form action="{{ route('workPositions.destroy', $workPosition->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Estas seguro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
