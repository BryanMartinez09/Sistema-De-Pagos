@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Arqueos</h2>
    <a href="{{ route('arqueos.create') }}" class="btn btn-primary">Agregar Arqueo</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Empleado</th>
                <th>Denominación</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($arqueos as $arqueo)
                <tr>
                    <td>{{ $arqueo->empleado->nombre }} {{ $arqueo->empleado->apellido }}</td>
                    <td>${{ number_format($arqueo->denominacion, 2) }}</td>
                    <td>{{ ucfirst($arqueo->tipo) }}</td>
                    <td>{{ $arqueo->cantidad }}</td>
                    <td>${{ number_format($arqueo->total, 2) }}</td>
                    <td>
                        <a href="{{ route('arqueos.edit', $arqueo->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('arqueos.destroy', $arqueo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar arqueo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
