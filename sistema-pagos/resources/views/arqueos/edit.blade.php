@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Arqueo</h2>

    <form action="{{ route('arqueos.update', $arqueo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="empleado_id">Empleado</label>
            <select name="empleado_id" id="empleado_id" class="form-control">
                <option value="">Seleccionar Empleado</option>
                @foreach ($empleados as $empleado)
                    <option value="{{ $empleado->id }}" {{ $empleado->id == $arqueo->empleado_id ? 'selected' : '' }}>
                        {{ $empleado->nombre }} {{ $empleado->apellido }}
                    </option>
                @endforeach
            </select>
            @error('empleado_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="denominacion">Denominación</label>
            <input type="number" step="0.01" class="form-control" name="denominacion" id="denominacion" value="{{ $arqueo->denominacion }}">
            @error('denominacion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" class="form-control">
                <option value="billete" {{ $arqueo->tipo == 'billete' ? 'selected' : '' }}>Billete</option>
                <option value="moneda" {{ $arqueo->tipo == 'moneda' ? 'selected' : '' }}>Moneda</option>
            </select>
            @error('tipo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" id="cantidad" value="{{ $arqueo->cantidad }}">
            @error('cantidad')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Arqueo</button>
    </form>
</div>
@endsection
