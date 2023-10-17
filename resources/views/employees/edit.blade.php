@extends('adminlte::page')

@section('title', 'Empleado')

@section('content_header')
    <h1>Editar Empleado</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('employees.update', $employee) }}" novalidate>

                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="">Nombre</label>
                    <input value="{{ $employee->name }}" type="text" class="form-control" name="name">
                    @error('name')
                        <small class="text-danger">El nombre es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Correo</label>
                    <input value="{{ $employee->email }}" type="text" class="form-control" name="email">
                    @error('email')
                        <small class="text-danger">El correo es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Carnet de identidad</label>
                    <input value="{{ $employee->document_number }}" type="text" class="form-control"
                        name="document_number">
                    @error('document_number')
                        <small class="text-danger">El C.I es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Fecha de nacimiento</label>
                    <input value="{{ $employee->birthday }}" type="date" class="form-control" name="birthday">
                    @error('birthday')
                        <small class="text-danger">El campo es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Telefono</label>
                    <input value="{{ $employee->phone }}" type="text" class="form-control" name="phone">
                    @error('phone')
                        <small class="text-danger">El telefono es requerido</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Ocupacion (opcional)</label>
                    <input value="{{ $employee->ocupation }}" type="text" class="form-control" name="ocupation">
                </div>

                <div class="form-group">
                    <label for="">Sucursal</label>
                    <select name = "branch_id" id="branch_id" class="form-control">
                        <option value="">
                            Seleccione una sucursal
                        </option>
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}" {{ $branch->id == $employee->branch_id ? 'selected' : '' }}>
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
                            Seleccione un cargo
                        </option>
                        @foreach ($workPositions as $workPosition)
                            <option value="{{ $workPosition->id }}" {{ $workPosition->id == $employee->work_position_id ? 'selected' : '' }}>
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
                    <select name = "user_id" id="user_id" class="form-control">
                        <option value="">
                            Seleccione un usuario
                        </option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $employee->user_id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-danger btn-sm" type="submit">Guardar</button>
                <a href="{{ route('employees.index') }}"class="btn btn-warning text-white btn-sm">Volver</a>
            </form>

        </div>
    </div>
@stop
