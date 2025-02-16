<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
            public function index()
        {
            $empleados = Empleado::all();
           // dd($empleados); // Esto te mostrará los empleados en la página
            return view('empleados.index', compact('empleados'));
        }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
        $empleado = Empleado::findOrFail($id);
      return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
{
    $empleado = Empleado::findOrFail($id);
    $empleado->delete();

    return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente.');
}

}
