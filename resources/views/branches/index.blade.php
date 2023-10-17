@extends('adminlte::page')

@section('title', 'Sucursales')

@section('content_header')
    <h1>LISTA DE SUCURSALES</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary btb-sm" href="{{ route('branches.create') }}">Registrar Sucursal</a>
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
                            <th scope="col">Direccion</th>
                            <th scope="col">Telefono</th>
                            <th scope="col" width="15%">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($branches as $branch)
                            <tr>
                                <td>{{ $branch->id }}</td>
                                <td>{{ $branch->name }}</td>
                                <td>{{ $branch->address }}</td>
                                <td>{{ $branch->phone }}</td>
                                <td>
                                    <form action="{{ route('branches.destroy', $branch) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('branches.edit', $branch) }}">Editar</a>

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
