@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Empleado</h2>
    <div class="employee-details">
        <p><strong>Nombre:</strong> {{ $empleado->nombre }}</p>
        <p><strong>Apellido:</strong> {{ $empleado->apellido }}</p>
        <p><strong>DUI:</strong> {{ $empleado->dui }}</p>
        <p><strong>Email:</strong> {{ $empleado->email }}</p>
        <p><strong>Saldo Acumulado:</strong> ${{ number_format($empleado->saldo_acumulado, 2) }}</p>
    </div>
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Volver</a>
</div>

<style>
/* Estilo general */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f7fc;
    color: #333;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Contenedor principal */
.container {
    margin-top: 30px;
    margin-bottom: 30px;
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

/* Título */
h2 {
    font-size: 2rem;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

/* Estilo para los detalles del empleado */
.employee-details p {
    font-size: 1.1rem;
    margin: 10px 0;
}

.employee-details strong {
    color: #555;
}

/* Botón de volver */
a.btn-secondary {
    display: inline-block;
    padding: 10px 20px;
    background-color: #6c757d;
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
    font-size: 1rem;
    transition: background-color 0.3s;
    margin-top: 20px;
}

a.btn-secondary:hover {
    background-color: #5a6268;
}
</style>
@endsection
