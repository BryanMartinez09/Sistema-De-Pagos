@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Seleccionar Empleado para Realizar el Pago</h2>

    <form action="{{ route('pagos.store') }}" method="POST">
        @csrf

        <div class="row">
            <!-- Columna izquierda con campos del formulario -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="empleado_id">Seleccionar Empleado</label>
                    <select id="empleado_id" name="empleado_id" class="form-control" required>
                        <option value="">Selecciona un empleado</option>
                        @foreach($empleados as $empleado)
                            <option value="{{ $empleado->id }}" data-saldo="{{ $empleado->saldo_acumulado }}">
                                {{ $empleado->nombre }} {{ $empleado->apellido }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="monto">Monto a Pagar</label>
                    <input type="number" id="monto" name="monto" class="form-control" value="{{ old('monto') }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="descuento">Descuento (%)</label>
                    <input type="number" id="descuento" name="descuento" class="form-control" value="{{ old('descuento', 0) }}" min="0" max="100">
                </div>

                <div class="mb-3">
                    <label for="prestamo">Préstamo</label>
                    <input type="number" id="prestamo" name="prestamo" class="form-control" value="{{ old('prestamo', 0) }}" min="0">
                </div>
            </div>

            <!-- Columna derecha con resumen de pago -->
            <div class="col-md-6">
                <h4>Resumen de Pago</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Monto</th>
                            <th>Descuento</th>
                            <th>Préstamo</th>
                            <th>Total a Pagar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="resumen-monto">${{ number_format(old('monto', 0), 2) }}</td>
                            <td id="resumen-descuento">{{ old('descuento', 0) }}%</td>
                            <td id="resumen-prestamo">${{ number_format(old('prestamo', 0), 2) }}</td>
                            <td id="resumen-total">${{ number_format(old('monto', 0) - (old('monto', 0) * old('descuento', 0) / 100) - old('prestamo', 0), 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Realizar Pago</button>
    </form>
</div>

<script>
    // Función para actualizar el resumen en tiempo real
    function actualizarResumen() {
        const monto = parseFloat(document.getElementById('monto').value) || 0;
        const descuento = parseFloat(document.getElementById('descuento').value) || 0;
        const prestamo = parseFloat(document.getElementById('prestamo').value) || 0;

        // Calcular el total a pagar
        const total = monto - (monto * descuento / 100) - prestamo;

        // Actualizar los valores en el resumen
        document.getElementById('resumen-monto').textContent = `$${monto.toFixed(2)}`;
        document.getElementById('resumen-descuento').textContent = `${descuento}%`;
        document.getElementById('resumen-prestamo').textContent = `$${prestamo.toFixed(2)}`;
        document.getElementById('resumen-total').textContent = `$${total.toFixed(2)}`;
    }

    // Cuando se selecciona un empleado, actualizar el monto
    document.getElementById('empleado_id').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const saldo = selectedOption.getAttribute('data-saldo');

        // Establecer el valor de "Monto a Pagar" como el saldo acumulado del empleado
        document.getElementById('monto').value = saldo;

        // Llamar a la función para actualizar el resumen
        actualizarResumen();
    });

    // Agregar eventos de "input" para actualizar el resumen en tiempo real
    document.getElementById('descuento').addEventListener('input', actualizarResumen);
    document.getElementById('prestamo').addEventListener('input', actualizarResumen);
    document.getElementById('monto').addEventListener('input', actualizarResumen);
</script>

@endsection
