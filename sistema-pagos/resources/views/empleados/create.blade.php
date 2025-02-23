@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-wrapper">
        <h2 class="title"><i class="fas fa-user-plus"></i> Agregar Empleado</h2>
        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre"><i class="fas fa-user"></i> Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apellido"><i class="fas fa-user"></i> Apellido</label>
                <input type="text" id="apellido" name="apellido" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="dui"><i class="fas fa-id-card"></i> DUI</label>
                <input type="text" id="dui" name="dui" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="saldo_acumulado"><i class="fas fa-wallet"></i> Saldo Acumulado</label>
                <input type="number" step="0.01" id="saldo_acumulado" name="saldo_acumulado" class="form-control">
            </div>
            <button type="submit" class="btn btn-submit"><i class="fas fa-save"></i> Guardar</button>
        </form>
    </div>
</div>

<style>
/* Estilo general */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f7f8fa;
    color: #333;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Contenedor principal */
.container {
   position: static;
}

/* Form Wrapper */
.form-wrapper {
    padding: 20px;
    background-color: #fdfdfd;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

/* Título */
.title {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 25px;
    text-align: center;
    font-weight: 600;
}

/* Estilo para las etiquetas de los campos */
label {
    font-size: 1.1rem;
    font-weight: 500;
    color: #555;
    margin-bottom: 8px;
    display: block;
}

/* Estilo para los campos de entrada */
.form-control {
    padding: 12px 15px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 20px;
    width: 100%;
    box-sizing: border-box;
    background-color: #f9f9f9;
    transition: border-color 0.3s, background-color 0.3s;
}

.form-control:focus {
    border-color: #007bff;
    background-color: #fff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
}

/* Iconos en los campos */
.form-group i {
    color: #007bff;
    margin-right: 10px;
}

/* Estilo para los botones */
button[type="submit"] {
    padding: 12px 25px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
    display: block;
    width: 100%;
    margin-top: 20px;
}

button[type="submit"]:hover {
    background-color: #218838;
    transform: translateY(-2px);
}

/* Estilo para los botones con iconos */
button[type="submit"] i {
    margin-right: 10px;
}

/* Espaciado entre los campos */
.form-group {
    margin-bottom: 30px;
}

/* Sombra para el botón */
button[type="submit"] {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Efecto al hacer foco en los inputs */
input:focus {
    border-color: #007bff;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
}
</style>

<!-- Include FontAwesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

@endsection
