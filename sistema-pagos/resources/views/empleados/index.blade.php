@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Empleados</h2>
    <a href="{{ route('empleados.create') }}" class="btn btn-primary">Agregar Empleado</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DUI</th>
                <th>Email</th>
                <th>Saldo Acumulado</th>
                <th>Acciones</th>
            </tr>
        </thead>

            <tbody>
                @forelse ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->apellido }}</td>
                        <td>{{ $empleado->dui }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>${{ number_format($empleado->saldo_acumulado, 2) }}</td>
                        <td>
                            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar empleado?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay empleados registrados.</td>
                    </tr>
                @endforelse
            </tbody>
    </table>
</div>
@endsection
