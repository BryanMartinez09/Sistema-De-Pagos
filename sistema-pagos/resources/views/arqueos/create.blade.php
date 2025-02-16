@extends('layouts.app')

@section('content')
<div class="container">
<head>
<link href="{{ asset('css/arqueo.css') }}" rel="stylesheet">


</head>


    <h2>Agregar Arqueo de Dinero</h2>

    <form action="{{ route('arqueos.store') }}" method="POST">
        @csrf

        <!-- Selección de empleado -->
        <div class="form-group">
            <label for="empleado_id">Empleado</label>
            <select name="empleado_id" id="empleado_id" class="form-control" required>
                <option value="">Seleccionar Empleado</option>
                <br>
                @foreach ($empleados as $empleado)
                    <option value="{{ $empleado->id }}">{{ $empleado->nombre }} {{ $empleado->apellido }}</option>
                @endforeach
            </select>
        </div>

        <!-- Diseño de billetes y monedas con mejor distribución -->
        <div class="row">
            
              <!-- Billetes -->
              <div class="form-group text-center col-md-4">
                <h4 class="text-center">Billetes</h4>
                <br>

                <!-- Billete de 100 -->
                <div class="form-group text-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/100dolares.png') }}" alt="Billete de 100" style="width: 160px; height: auto;">
                        <button type="button" class="btn btn-secondary ml-2" onclick="incrementar('billete_100')"><i class="fas fa-plus"></i></button>
                        <input type="number" class="form-control d-inline" id="billete_100" name="billete_100" value="0" min="0" readonly style="width: 80px;">
                        <button type="button" class="btn btn-secondary ml-2" onclick="decrementar('billete_100')"><i class="fas fa-minus"></i></button>
                    </div>
                </div>

                <!-- Billete de 50 -->
                <div class="form-group text-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/50.png') }}" alt="Billete de 50" style="width: 160px; height: auto;">
                        <button type="button" class="btn btn-secondary ml-2" onclick="incrementar('billete_50')"><i class="fas fa-plus"></i></button>
                        <input type="number" class="form-control d-inline" id="billete_50" name="billete_50" value="0" min="0" readonly style="width: 80px;">
                        <button type="button" class="btn btn-secondary ml-2" onclick="decrementar('billete_50')"><i class="fas fa-minus"></i></button>
                    </div>
                </div>

                <!-- Billete de 20 -->
                <div class="form-group text-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/20varos.jpg') }}" alt="Billete de 20" style="width: 160px; height: auto;">
                        <button type="button" class="btn btn-secondary ml-2" onclick="incrementar('billete_20')"><i class="fas fa-plus"></i></button>
                        <input type="number" class="form-control d-inline" id="billete_20" name="billete_20" value="0" min="0" readonly style="width: 80px;">
                        <button type="button" class="btn btn-secondary ml-2" onclick="decrementar('billete_20')"><i class="fas fa-minus"></i></button>
                    </div>
                </div>

                <!-- Billete de 10 -->
                <div class="form-group text-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/10varos.jpg') }}" alt="Billete de 10" style="width: 160px; height: auto;">
                        <button type="button" class="btn btn-secondary ml-2" onclick="incrementar('billete_10')"><i class="fas fa-plus"></i></button>
                        <input type="number" class="form-control d-inline" id="billete_10" name="billete_10" value="0" min="0" readonly style="width: 80px;">
                        <button type="button" class="btn btn-secondary ml-2" onclick="decrementar('billete_10')"><i class="fas fa-minus"></i></button>
                    </div>
                </div>

                <!-- Billete de 5 -->
                <div class="form-group text-center">
                    
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/5.jpg') }}" alt="Billete de 5" style="width: 160px; height: auto;">
                        <button type="button" class="btn btn-secondary ml-2" onclick="incrementar('billete_5')"><i class="fas fa-plus"></i></button>
                        <input type="number" class="form-control d-inline" id="billete_5" name="billete_5" value="0" min="0" readonly style="width: 80px;">
                        <button type="button" class="btn btn-secondary ml-2" onclick="decrementar('billete_5')"><i class="fas fa-minus"></i></button>
                    </div>
                </div>

            </div>

            <!-- Monedas -->
            <div class="col-md-4">
                <h4>Monedas</h4>

                <div class="form-group text-center">
                    
                    <img src="{{ asset('img/1dolar.png') }}" alt="Moneda de 1" style="width: 60px; height: auto;">
                    <button type="button" class="btn btn-secondary" onclick="incrementar('moneda_1')"><i class="fas fa-plus"></i></button>
                    <input type="number" class="form-control d-inline" id="moneda_1" name="moneda_1" value="0" min="0" readonly style="width: 80px;">
                    <button type="button" class="btn btn-secondary" onclick="decrementar('moneda_1')"><i class="fas fa-minus"></i></button>
                </div>
                
                <div class="form-group text-center">
                  
                    <img src="{{ asset('img/25centavos.png') }}" alt="Moneda de 0.25" style="width: 60px; height: auto;">
                    <button type="button" class="btn btn-secondary" onclick="incrementar('moneda_0_25')"><i class="fas fa-plus"></i></button>
                    <input type="number" class="form-control d-inline" id="moneda_0_25" name="moneda_0_25" value="0" min="0" readonly style="width: 80px;">
                    <button type="button" class="btn btn-secondary" onclick="decrementar('moneda_0_25')"><i class="fas fa-minus"></i></button>
                </div>

                <div class="form-group text-center">
                    
                    <img src="{{ asset('img/10cebtavos.png') }}" alt="Moneda de 0.10" style="width: 60px; height: auto;">
                    <button type="button" class="btn btn-secondary" onclick="incrementar('moneda_0_10')"><i class="fas fa-plus"></i></button>
                    <input type="number" class="form-control d-inline" id="moneda_0_10" name="moneda_0_10" value="0" min="0" readonly style="width: 80px;">
                    <button type="button" class="btn btn-secondary" onclick="decrementar('moneda_0_10')"><i class="fas fa-minus"></i></button>
                </div>

                <div class="form-group text-center">
                    
                    <img src="{{ asset('img/5centavos.png') }}" alt="Moneda de 0.05" style="width: 60px; height: auto;">
                    <button type="button" class="btn btn-secondary" onclick="incrementar('moneda_0_05')"><i class="fas fa-plus"></i></button>
                    <input type="number" class="form-control d-inline" id="moneda_0_05" name="moneda_0_05" value="0" min="0" readonly style="width: 80px;">
                    <button type="button" class="btn btn-secondary" onclick="decrementar('moneda_0_05')"><i class="fas fa-minus"></i></button>
                </div>
            </div>

            <!-- Resumen -->
            <div class="col-md-4">
                <h4>Resumen</h4>
                
                <div class="form-group">
                    <label for="total">Total Calculado</label>
                    <input type="text" class="form-control" id="total" name="total" value="0.00" readonly>
                </div>

                <div class="form-group">
                    <label for="pago_empleado">Pago al Empleado (13%)</label>
                    <input type="text" class="form-control" id="pago_empleado" name="pago_empleado" value="0.00" readonly>
                </div>

                <!-- Prima de Venta -->
                <h4>Prima de Venta</h4>
                <div class="form-group">
                    <label for="producto">Producto</label>
                    <input type="text" class="form-control" id="producto" name="producto" placeholder="Nombre del Producto" required>
                </div>

                <div class="form-group">
                    <label for="prima">Prima</label>
                    <input type="number" class="form-control" id="prima" name="prima" placeholder="Prima" min="0" required>
                </div>

                <div class="form-group">
                    <label for="pago_prima">Pago de la Prima</label>
                    <input type="number" class="form-control" id="pago_prima" name="pago_prima" value="0.00">
                </div>

                <button type="button" class="btn btn-primary" onclick="agregarPrima()">Agregar Prima</button>

                <ul id="lista_primas"></ul>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4" id="guardar-arqueo">Guardar Arqueo</button>

    </form>
</div>

<script>
var listaPrimas = []; // Guardar las primas en un arreglo para futura edición

// Función para agregar una prima a la lista
function agregarPrima() {
    var producto = document.getElementById('producto').value;
    var prima = parseFloat(document.getElementById('prima').value) || 0;
    var pagoPrima = parseFloat(document.getElementById('pago_prima').value) || 0;

    if (producto && prima > 0) {
        // Crear un objeto para la prima
        var primaObj = {
            producto: producto,
            prima: prima,
            pagoPrima: pagoPrima
        };

        // Agregar el objeto a la lista de primas
        listaPrimas.push(primaObj);
        actualizarListaPrimas();

        // Limpiar los campos de la prima
        document.getElementById('producto').value = '';
        document.getElementById('prima').value = '0';
        document.getElementById('pago_prima').value = '0.00';
    }
}

// Función para actualizar la lista de primas mostrada
function actualizarListaPrimas() {
    var listaElementos = document.getElementById('lista_primas');
    listaElementos.innerHTML = ''; // Limpiar lista actual

    // Mostrar cada prima en la lista
    listaPrimas.forEach(function(prima, index) {
        var li = document.createElement('li');
        li.classList.add('d-flex', 'align-items-center');
        li.innerHTML = `
            <div class="mr-3">
                <strong>Producto:</strong> ${prima.producto} <br>
                <strong>Prima:</strong> $${prima.prima.toFixed(2)} <br>
                <strong>Pago Prima:</strong> $${prima.pagoPrima.toFixed(2)}
            </div>
            <button class="btn btn-sm btn-warning mr-2" onclick="editarPrima(${index})">✏️</button>
            <button class="btn btn-sm btn-danger" onclick="eliminarPrima(${index})">❌</button>
        `;
        listaElementos.appendChild(li);
    });

    // Recalcular el total y el pago al empleado
    calcularTotal();
}

// Función para editar una prima
function editarPrima(index) {
    var prima = listaPrimas[index];

    // Rellenar los campos con los datos de la prima seleccionada
    document.getElementById('producto').value = prima.producto;
    document.getElementById('prima').value = prima.prima;
    document.getElementById('pago_prima').value = prima.pagoPrima;

    // Eliminar la prima de la lista antes de actualizarla
    listaPrimas.splice(index, 1);
    actualizarListaPrimas();
}

// Función para eliminar una prima
function eliminarPrima(index) {
    // Eliminar la prima de la lista
    listaPrimas.splice(index, 1);
    actualizarListaPrimas();
}

// Función para calcular el total y el pago al empleado
function calcularTotal() {
    var total = 0;
    var pagoEmpleado = 0;

    // Calcular el total de billetes y monedas
    total += (parseInt(document.getElementById('billete_100').value) * 100);
    total += (parseInt(document.getElementById('billete_50').value) * 50);
    total += (parseInt(document.getElementById('billete_20').value) * 20);
    total += (parseInt(document.getElementById('billete_10').value) * 10);
    total += (parseInt(document.getElementById('billete_5').value) * 5);
    total += (parseInt(document.getElementById('moneda_1').value) * 1);
    total += (parseInt(document.getElementById('moneda_0_25').value) * 0.25);
    total += (parseInt(document.getElementById('moneda_0_10').value) * 0.10);
    total += (parseInt(document.getElementById('moneda_0_05').value) * 0.05);

    // Incluir el total de las primas en el cálculo del total (solo para mostrarlo, no para el pago al empleado)
    listaPrimas.forEach(function(prima) {
        total += prima.prima; // Solo agregamos la prima al total
        pagoEmpleado += prima.pagoPrima; // Sumar el pago de la prima al total del pago al empleado
    });

    // Calcular el pago al empleado (13% del total del arqueo sin contar las primas)
    var pagoBaseEmpleado = (total - getTotalPrimas()) * 0.13;
    pagoEmpleado += pagoBaseEmpleado; // Sumamos el pago base (13%) al pago de la prima

    // Mostrar los resultados en el formulario
    document.getElementById('total').value = total.toFixed(2); // Total del arqueo (con las primas sumadas)
    document.getElementById('pago_empleado').value = pagoEmpleado.toFixed(2); // Pago al empleado (13% + primas)
}

// Función para obtener el total de las primas
function getTotalPrimas() {
    var totalPrimas = 0;
    listaPrimas.forEach(function(prima) {
        totalPrimas += prima.prima;
    });
    return totalPrimas;
}

// Funciones para incrementar y decrementar valores de billetes y monedas
function incrementar(id) {
    var input = document.getElementById(id);
    input.value = parseInt(input.value) + 1;
    calcularTotal();
}

function decrementar(id) {
    var input = document.getElementById(id);
    if (input.value > 0) {
        input.value = parseInt(input.value) - 1;
    }
    calcularTotal();
}

</script>

@endsection
