

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Aumentar Salario de {{ $empleado->nombres }} {{ $empleado->apellidos }}</h1>

    <form action="{{ route('empleados.aumentarSalario', $empleado->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="cedula" class="form-label">Cédula</label>
            <input type="text" id="cedula" class="form-control" value="{{ $empleado->cedula }}" readonly>
        </div>

        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" id="nombres" class="form-control" value="{{ $empleado->nombres }}" readonly>
        </div>

        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" id="apellidos" class="form-control" value="{{ $empleado->apellidos }}" readonly>
        </div>

        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input type="text" id="ciudad" class="form-control" value="{{ $empleado->ciudad }}" readonly>
        </div>

        <div class="mb-3">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" id="cargo" class="form-control" value="{{ $empleado->cargo }}" readonly>
        </div>

        <div class="mb-3">
            <label for="salario_base" class="form-label">Salario Base Actual</label>
            <input type="text" id="salario_base" class="form-control" value="{{ $empleado->salario_base }}" readonly>
        </div>

        <div class="mb-3">
            <label for="incremento" class="form-label">Monto de Aumento</label>
            <input type="number" name="incremento" id="incremento" class="form-control"  required>
        </div>

        <button type="submit" class="btn btn-primary">Aumentar Salario</button>
        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
