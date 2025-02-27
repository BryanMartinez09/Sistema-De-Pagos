@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>PAGOS</h2>
        <h3>Lista</h3>
        <h4>Aprobaciones</h4>
        <h5>Listados completos</h5>
        <h6>List</h6>
        <h7>Hola mundos</h7>
        <h8>hola</h8>
        <table class="table">
            <thead>
                <tr>
                    <th>Empleado</th>
                    <th>Monto</th>
                    <th>Descuento</th>
                    <th>Préstamo</th>
                    <th>Total a Pagar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagos as $pago)
                    <tr>
                        <td>{{ $pago->empleado->nombre }} {{ $pago->empleado->apellido }}</td>
                        <td>${{ number_format($pago->monto, 2) }}</td>
                        <td>{{ $pago->descuento }}%</td>
                        <td>${{ number_format($pago->prestamo, 2) }}</td>
                        <td>${{ number_format($pago->total_pagar, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
