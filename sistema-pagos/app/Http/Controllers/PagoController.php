<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Empleado;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    // Método para mostrar todos los pagos (index)
    public function index()
    {
        $pagos = Pago::all();
        return view('pagos.index', compact('pagos'));
    }

    // Método para mostrar un solo pago (show)
    public function show(Pago $pago)
    {
        return view('pagos.show', compact('pago'));
    }

    // Mostrar formulario de pago con empleados
    public function create()
    {
        // Obtener todos los empleados
        $empleados = Empleado::all();
        
        // Pasar todos los empleados a la vista
        return view('pagos.create', compact('empleados'));
    }

    // Procesar el pago y actualizar el saldo
    public function store(Request $request)
    {
        $empleado = Empleado::findOrFail($request->empleado_id);

        $request->validate([
            'monto' => 'required|numeric|min:0|max:' . $empleado->saldo_acumulado,
            'descuento' => 'required|numeric|min:0|max:100',
            'prestamo' => 'required|numeric|min:0',
        ]);

        // Calcular el total a pagar
        $totalPagar = $request->monto - ($request->monto * $request->descuento / 100) - $request->prestamo;

        // Crear el registro de pago
        $pago = new Pago();
        $pago->empleado_id = $empleado->id;
        $pago->monto = $request->monto;
        $pago->descuento = $request->descuento;
        $pago->prestamo = $request->prestamo;
        $pago->total_pagar = $totalPagar;
        $pago->save();

        // Actualizar saldo acumulado del empleado
        $empleado->saldo_acumulado -= $totalPagar;
        $empleado->save();

        return redirect()->route('empleados.pagos', $empleado->id)->with('success', 'Pago realizado correctamente');
    }
}
