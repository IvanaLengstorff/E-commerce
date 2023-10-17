@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>LISTA DE VENTAS</h1>
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
                            <th scope="col">Total</th>
                            <th scope="col">Empleado</th>
                            <th scope="col">Metodo de pago</th>
                            <th scope="col">Sucursal</th>
                            <th scope="col" width="15%">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($sells as $sell)
                            <tr>
                                <td>{{ $sell->id }}</td>
                                <td>{{ $sell->date }}</td>
                                <td>{{ $sell->total }}</td>
                                <td>{{ $sell->employee_id ? $sell->Employee->name : 'sin empleado' }}</td>
                                <td>{{ $sell->payment_method_id ? $sell->PaymentMethod->name : 'sin metodo' }}</td>
                                <td>{{ $sell->branch_id ? $sell->Branch->name : 'sin sucursal' }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('sells.show', $sell) }}">Ver detalle</a>
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
