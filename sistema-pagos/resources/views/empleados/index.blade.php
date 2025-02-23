@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="title"><i class="fas fa-users"></i> Lista de Empleados</h1>

    <a href="{{ route('empleados.create') }}" class="btn-add">
        <i class="fas fa-user-plus"></i> Agregar Empleado
    </a>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th><i class="fas fa-user"></i> Nombre</th>
                    <th><i class="fas fa-user"></i> Apellido</th>
                    <th><i class="fas fa-id-card"></i> DUI</th>
                    <th><i class="fas fa-envelope"></i> Email</th>
                    <th><i class="fas fa-wallet"></i> Saldo Acumulado</th>
                    <th><i class="fas fa-cogs"></i> Acciones</th>
                </tr>
            </thead>
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <tbody>
                @forelse ($empleados as $empleado)
                    <tr id="empleado-{{ $empleado->id }}">
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->apellido }}</td>
                        <td>{{ $empleado->dui }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>${{ number_format($empleado->saldo_acumulado, 2) }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn edit">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <button type="button" class="btn delete btn-delete" data-id="{{ $empleado->id }}">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay empleados registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
/* Estilo general */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f9fafb;
    color: #333;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Contenedor principal */
.container {
    position: static;
}

/* Título */
.title {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

/* Botón de agregar empleado */
.btn-add {
    display: inline-block;
    padding: 12px 25px;
    margin-bottom: 20px;
    background-color:rgb(6, 136, 150);
    color: #fff;
    border-radius: 8px;
    text-decoration: none;
    font-size: 1.1rem;
    transition: background-color 0.3s, transform 0.3s;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.btn-add:hover {
    background-color:rgb(51, 156, 201);
    transform: translateY(-2px);
}

.btn-add i {
    margin-right: 10px;
}

/* Tabla */
.table-container {
    overflow-x: auto;
    margin-top: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    padding: 15px;
}

table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 8px;
}

table th, table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    word-wrap: break-word;
}

table th {
    background-color: #007bff;
    color: #fff;
    font-size: 1rem;
}

table td {
    font-size: 0.95rem;
}

/* Celdas con saldo acumulado */
td:nth-child(5) {
    font-weight: bold;
    color: #28a745;
}

/* Botones de acción */
.action-buttons {
    display: flex;
    gap: 12px;
    white-space: nowrap;
}

.btn {
    padding: 8px 14px;
    border-radius: 6px;
    font-size: 0.95rem;
    color: #fff;
    text-decoration: none;
    text-align: center;
    transition: background-color 0.3s, transform 0.3s;
}

.btn.edit {
    background-color: #007bff;
}

.btn.edit:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
}

.btn.delete {
    background-color: #dc3545;
}

.btn.delete:hover {
    background-color: #c82333;
    transform: translateY(-2px);
}

.btn-delete {
    background-color: transparent;
    border: none;
    cursor: pointer;
}

.text-center {
    text-align: center;
}

/* Estilo para los mensajes */
.swal2-popup {
    font-size: 1.2rem;
    padding: 20px;
    border-radius: 8px;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function () {
        const empleadoId = this.getAttribute('data-id');
        Swal.fire({
            title: "¿Estás seguro?",
            text: "Esta acción no se puede deshacer.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then(result => {
            if (result.isConfirmed) {
                // Enviar la solicitud para eliminar el empleado
                fetch(`{{ url('/empleados/') }}/${empleadoId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: "Empleado eliminado",
                            text: "El empleado ha sido eliminado correctamente.",
                            icon: "success",
                            confirmButtonColor: "#28a745"
                        });

                        // Remover la fila de la tabla
                        document.getElementById(`empleado-${empleadoId}`).remove();
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: "Hubo un problema al eliminar el empleado.",
                            icon: "error"
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: "Error",
                        text: "Hubo un problema al eliminar el empleado.",
                        icon: "error"
                    });
                });
            } else {
                Swal.fire({
                    title: "Acción cancelada",
                    text: "No se eliminó al empleado.",
                    icon: "info"
                });
            }
        });
    });
});
</script>

@endsection
