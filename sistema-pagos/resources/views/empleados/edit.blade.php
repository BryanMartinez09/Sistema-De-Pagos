@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Empleado</h2>
    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{{ $empleado->nombre }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Apellido</label>
            <input type="text" name="apellido" value="{{ $empleado->apellido }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>DUI</label>
            <input type="text" name="dui" value="{{ $empleado->dui }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $empleado->email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Saldo Acumulado</label>
            <input type="number" step="0.01" name="saldo_acumulado" value="{{ $empleado->saldo_acumulado }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
