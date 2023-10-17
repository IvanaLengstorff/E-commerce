@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <h1>Registrar Empleado</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('employees.store') }}" novalidate>
                @csrf
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="name">
                    @error('name')
                        <small class="text-danger">El nombre es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Correo</label>
                    <input type="text" class="form-control" name="email">
                    @error('email')
                        <small class="text-danger">El correo es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Carnet de identidad</label>
                    <input type="text" class="form-control" name="document_number">
                    @error('document_number')
                        <small class="text-danger">El C.I es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="birthday">
                    @error('birthday')
                        <small class="text-danger">El campo es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Telefono</label>
                    <input type="text" class="form-control" name="phone">
                    @error('phone')
                        <small class="text-danger">El Telefono es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Ocupacion (opcional)</label>
                    <input type="text" class="form-control" name="ocupation">
                </div>

                <div class="form-group">
                    <label for="">Sucursal</label>
                    <select name = "branch_id" id="branch_id" class="form-control">
                        <option value="">
                            Seleccione una sucursal
                        </option>
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}">
                                {{ $branch->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('branch_id')
                        <small class="text-danger">La sucursal es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Cargo</label>
                    <select name = "work_position_id" id="work_position_id" class="form-control">
                        <option value="">
                            Seleccione una sucursal
                        </option>
                        @foreach ($workPositions as $workPosition)
                            <option value="{{ $workPosition->id }}">
                                {{ $workPosition->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('work_position_id')
                        <small class="text-danger">El cargo es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Usuario (opcional)</label>
                    <select name = "work_position_id" id="work_position_id" class="form-control">
                        <option value="">
                            Seleccione una sucursal
                        </option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-danger btn-sm" type="submit">Registrar</button>

                <a href="{{ route('employees.index') }}"class="btn btn-warning text-white btn-sm">Volver</a>
            </form>

        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
