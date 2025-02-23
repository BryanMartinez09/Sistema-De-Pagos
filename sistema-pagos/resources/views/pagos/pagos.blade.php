<form method="POST" action="{{ route('empleados.pagar', $empleado->id) }}">
    @csrf
    <div>
        <label for="empleado">Empleado</label>
        <select name="empleado_id" id="empleado">
            @foreach($empleados as $empleado)
                <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="monto">Monto del arqueo</label>
        <input type="number" id="monto" name="monto" required>
    </div>

    <div>
        <label for="porcentaje">Porcentaje a pagar</label>
        <input type="number" id="porcentaje" name="descuento" value="13" required>
    </div>

    <div>
        <label for="prestamo">Prestamo (si aplica)</label>
        <input type="number" id="prestamo" name="prestamo" value="0">
    </div>

    <button type="submit">Realizar pago</button>
</form>
