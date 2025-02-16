@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Arqueo</h2>

    <table class="table">
        <tr>
            <th>Empleado</th>
            <td>{{ $arqueo->empleado->nombre }} {{ $arqueo->empleado->apellido }}</td>
        </tr>
        <tr>
            <th>Denominación</th>
            <td>${{ number_format($arqueo->denominacion, 2) }}</td>
        </tr>
        <tr>
            <th>Tipo</th>
            <td>{{ ucfirst($arqueo->tipo) }}</td>
        </tr>
        <tr>
            <th>Cantidad</th>
            <td>{{ $arqueo->cantidad }}</td>
        </tr>
        <tr>
            <th>Total</th>
            <td>${{ number_format($arqueo->total, 2) }}</td>
        </tr>
    </table>

    <a href="{{ route('arqueos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
