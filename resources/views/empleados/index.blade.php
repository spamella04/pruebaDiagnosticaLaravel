@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Registro Empleados</h1>

    <a href="{{ route('empleados.create') }}" class="btn btn-primary mb-3">Nuevo Empleado</a>
    
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Ciudad</th>
                <th>Cargo</th>
                <th>Salario Base</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->cedula }}</td>
                    <td>{{ $empleado->nombres }}</td>
                    <td>{{ $empleado->apellidos }}</td>
                    <td>{{ $empleado->ciudad }}</td>
                    <td>{{ $empleado->cargo }}</td>
                    <td>C$ {{ number_format($empleado->salario_base, 2) }}</td>
                    <td>
                        <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        @if ($empleado->salario_base < 10000)
                         <a href="{{ route('empleados.aumentarSalarioForm', $empleado->id) }}" class="btn btn-success btn-sm">Aumentar Salario</a>
                        @endif
                        <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este empleado?')">Eliminar</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection