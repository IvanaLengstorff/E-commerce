@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <h1>LISTA DE EMPLEADOS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary btb-sm" href="{{ route('employees.create') }}">Registrar Empleado</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-striped" id="materias">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">CI</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Sucursal</th>
                            <th scope="col" width="15%">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->document_number }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->work_position_id ? $employee->workPosition->name : 'sin cargo' }}</td>
                                <td>{{ $employee->branch_id? $employee->Branch->name : 'sin sucursal'  }}</td>
                                <td>
                                    <form action="{{ route('employees.destroy', $employee) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('employees.edit', $employee) }}">Editar</a>

                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')"
                                            value="Borrar">Eliminar</button>

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
            $('#materias').DataTable();
        });
    </script>
@stop
