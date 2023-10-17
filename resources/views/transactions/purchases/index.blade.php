@extends('adminlte::page')

@section('title', 'Compras')

@section('content_header')
    <h1>LISTA DE COMPRAS</h1>
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

                        @foreach ($purchases as $purchase)
                            <tr>
                                <td>{{ $purchase->id }}</td>
                                <td>{{ $purchase->date }}</td>
                                <td>{{ $purchase->total }}</td>
                                <td>{{ $purchase->employee_id ? $purchase->Employee->name : 'sin empleado' }}</td>
                                <td>{{ $purchase->payment_method_id ? $purchase->PaymentMethod->name : 'sin metodo' }}</td>
                                <td>{{ $purchase->branch_id ? $purchase->Branch->name : 'sin sucursal' }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('purchases.show', $purchase) }}">Ver detalle</a>
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
