<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arqueo;
use App\Models\Empleado;

class ArqueoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los arqueos junto con los empleados asociados
        $arqueos = Arqueo::with('empleado')->get();
        return view('arqueos.index', compact('arqueos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los empleados para asociarlos al arqueo
        $empleados = Empleado::all();
        return view('arqueos.create', compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'denominacion' => 'required|numeric',
            'tipo' => 'required|in:billete,moneda',
            'cantidad' => 'required|integer|min:1',
            'empleado_id' => 'required|exists:empleados,id',
        ]);

        // Calcular el total basado en la denominación y cantidad
        $total = $request->denominacion * $request->cantidad;

        // Crear el arqueo y asociarlo con el empleado
        Arqueo::create([
            'denominacion' => $request->denominacion,
            'tipo' => $request->tipo,
            'cantidad' => $request->cantidad,
            'total' => $total,
            'empleado_id' => $request->empleado_id,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('arqueos.index')->with('success', 'Arqueo guardado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mostrar detalles de un arqueo
        $arqueo = Arqueo::findOrFail($id);
        return view('arqueos.show', compact('arqueo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener el arqueo y los empleados para editar
        $arqueo = Arqueo::findOrFail($id);
        $empleados = Empleado::all();
        return view('arqueos.edit', compact('arqueo', 'empleados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos recibidos
        $request->validate([
            'denominacion' => 'required|numeric',
            'tipo' => 'required|in:billete,moneda',
            'cantidad' => 'required|integer|min:1',
            'empleado_id' => 'required|exists:empleados,id',
        ]);

        // Encontrar el arqueo y actualizarlo
        $arqueo = Arqueo::findOrFail($id);
        $arqueo->update([
            'denominacion' => $request->denominacion,
            'tipo' => $request->tipo,
            'cantidad' => $request->cantidad,
            'total' => $request->denominacion * $request->cantidad,
            'empleado_id' => $request->empleado_id,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('arqueos.index')->with('success', 'Arqueo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Eliminar el arqueo
        $arqueo = Arqueo::findOrFail($id);
        $arqueo->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('arqueos.index')->with('success', 'Arqueo eliminado correctamente.');
    }
}
