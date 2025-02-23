<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Pago;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dui' => 'required|string|max:255',
            'email' => 'required|email|unique:empleados,email',
            'saldo_acumulado' => 'numeric|min:0',
        ]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dui' => 'required|string|max:255',
            'email' => 'required|email|unique:empleados,email',
            'saldo_acumulado' => 'numeric|min:0',
        ]);

        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        if ($empleado) {
            $empleado->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 400);
    }


   // Eliminar el método 'pagar' que está duplicado y centralizar la lógica en PagoController
public function pagos(Empleado $empleado)
{
    // Mostrar los pagos del empleado
    $pagos = $empleado->pagos; // Relación definida en el modelo Empleado
    return view('empleados.pagos', compact('empleado', 'pagos'));
}


public function pagar(Request $request, Empleado $empleado)
{
    // Lógica para pagar y actualizar saldo
    $request->validate([
        'monto' => 'required|numeric|min:0',
        'descuento' => 'required|numeric|min:0|max:100',
        'prestamo' => 'required|numeric|min:0',
    ]);

    // Calcular el total a pagar
    $totalPagar = $request->monto - ($request->monto * $request->descuento / 100) - $request->prestamo;

    // Crear un pago
    $pago = new Pago();
    $pago->empleado_id = $empleado->id;
    $pago->monto = $request->monto;
    $pago->descuento = $request->descuento;
    $pago->prestamo = $request->prestamo;
    $pago->total_pagar = $totalPagar;
    $pago->save();

    // Actualizar el saldo del empleado
    $empleado->saldo_acumulado -= $totalPagar;
    $empleado->save();

    return redirect()->route('empleados.pagos', $empleado->id)->with('success', 'Pago realizado correctamente');
}



    
}
