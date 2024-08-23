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
        //
    try{
     $empleados = Empleado::orderBy('apellidos')->orderBy('nombres')->get();
    return view('empleados.index', compact('empleados'));
    }   catch(\Exception $ex){
        return back()->withError($ex->getMessage());
    }
       
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        try{
            return view('empleados.create');
        }catch(\Exception $ex){
            return back()->withError($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'cedula' => 'required|unique:empleados,cedula|max:255',
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'ciudad' => 'required|max:255',
            'cargo' => 'required|max:255',
            'salario_base' => 'required|numeric|min:0',
        ]);
    
        try {
            $empleado = new Empleado();
            $empleado->cedula = $request->cedula;
            $empleado->nombres = $request->nombres;
            $empleado->apellidos = $request->apellidos;
            $empleado->ciudad = $request->ciudad;
            $empleado->cargo = $request->cargo;
            $empleado->salario_base = $request->salario_base;
            $empleado->save();
    
            return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente.');
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        try {
            $empleado = Empleado::findOrFail($id);
            return view('empleados.edit', compact('empleado'));
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'cedula' => 'required|max:255|unique:empleados,cedula,' . $id,
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'ciudad' => 'required|max:255',
            'cargo' => 'required|max:255',
            'salario_base' => 'required|numeric|min:0',
        ]);
    
        try {
            $empleado = Empleado::findOrFail($id);
            $empleado->update($request->all());
    
            return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente.');
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try	{
            $empleado = Empleado::findOrFail($id);
            $empleado->delete();
            return redirect()->route('empleados.index')->with('success', 'Empleado eliminado exitosamente.');
        } catch (\Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    public function aumentarSalarioForm($id)
{
    try {
        $empleado = Empleado::findOrFail($id);

        // Verifica si el salario es menor a 10,000
        if ($empleado->salario_base >= 10000) {
            return redirect()->route('empleados.index')->with('error', 'Este empleado no es elegible para un aumento de salario.');
        }

        return view('empleados.aumentarsalario', compact('empleado'));
    } catch (\Exception $ex) {
        return back()->withError($ex->getMessage());
    }
}

public function aumentarSalario(Request $request, $id)
{
    $request->validate([
        'incremento' => 'required|numeric|min:0',
    ]);

    try {
        $empleado = Empleado::findOrFail($id);

        if ($empleado->salario_base < 10000) {
            $empleado->salario_base += $request->incremento;
            $empleado->save();

            return redirect()->route('empleados.index')->with('success', 'Salario aumentado exitosamente.');
        } else {
            return redirect()->route('empleados.index')->with('error', 'Este empleado no es elegible para un aumento de salario.');
        }
    } catch (\Exception $ex) {
        return back()->withError($ex->getMessage());
    }
}

}

