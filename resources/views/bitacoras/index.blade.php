@extends('adminlte::page')

@section('title', 'Bitacora')

@section('content_header')
    <h1>BITACORA</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-striped" id="materias">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Tabla</th>
                            <th scope="col">Accion</th>
                            <th scope="col">Cambios</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($bitacoras as $bitacora)
                            <tr>
                                <td>{{ $bitacora->id }}</td>
                                <td>{{ $bitacora->created_at }}</td>
                                <td>{{ $bitacora->user_id ? $bitacora->User->name : 'sin usuario' }}</td>
                                <td>{{ $bitacora->table }}</td>
                                <td>{{ $bitacora->action }}</td>
                                <td>{{ $bitacora->changes }}</td>
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
            $('#materias').DataTable();
        });
    </script>
@stop
