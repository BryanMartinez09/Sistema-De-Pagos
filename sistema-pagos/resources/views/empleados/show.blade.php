@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Empleado</h2>
    <p><strong>Nombre:</strong> {{ $empleado->nombre }}</p>
    <p><strong>Apellido:</strong> {{ $empleado->apellido }}</p>
    <p><strong>DUI:</strong> {{ $empleado->dui }}</p>
    <p><strong>Email:</strong> {{ $empleado->email }}</p>
    <p><strong>Saldo Acumulado:</strong> ${{ number_format($empleado->saldo_acumulado, 2) }}</p>
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
