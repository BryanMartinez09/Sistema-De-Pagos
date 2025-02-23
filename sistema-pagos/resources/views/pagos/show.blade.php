@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles del Pago</h2>
        <table class="table">
            <tr>
                <th>Empleado</th>
                <td>{{ $pago->empleado->nombre }} {{ $pago->empleado->apellido }}</td>
            </tr>
            <tr>
                <th>Monto</th>
                <td>${{ number_format($pago->monto, 2) }}</td>
            </tr>
            <tr>
                <th>Descuento</th>
                <td>{{ $pago->descuento }}%</td>
            </tr>
            <tr>
                <th>Préstamo</th>
                <td>${{ number_format($pago->prestamo, 2) }}</td>
            </tr>
            <tr>
                <th>Total a Pagar</th>
                <td>${{ number_format($pago->total_pagar, 2) }}</td>
            </tr>
        </table>
    </div>
@endsection
