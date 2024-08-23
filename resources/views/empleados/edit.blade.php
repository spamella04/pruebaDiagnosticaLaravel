

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Editar Empleado</h1>

  
    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="cedula" class="form-label">Cédula</label>
            <input type="text" name="cedula" id="cedula" class="form-control" value="{{ old('cedula', $empleado->cedula) }}" required>
        </div>

        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" name="nombres" id="nombres" class="form-control" value="{{ old('nombres', $empleado->nombres) }}" required>
        </div>

        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ old('apellidos', $empleado->apellidos) }}" required>
        </div>

        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{ old('ciudad', $empleado->ciudad) }}" required>
        </div>

        <div class="mb-3">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" name="cargo" id="cargo" class="form-control" value="{{ old('cargo', $empleado->cargo) }}" required>
        </div>

        <div class="mb-3">
            <label for="salario_base" class="form-label">Salario Base</label>
            <input type="number" name="salario_base" id="salario_base" class="form-control" step="0.01" value="{{ old('salario_base', $empleado->salario_base) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
