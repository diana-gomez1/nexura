<?php

namespace App\Http\Controllers;

use App\Models\Empleado; // se impota el modelo Empleado
use App\Models\Area; // se importa el modelo Area
use App\Models\Rol; // se importa el modelo Rol
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        //se obtiene todos los empleados con areas y roles relacionados
        $empleados = Empleado::with(['area', 'roles'])->get();
        
        //se retorna la vista 'empleados.index' y se le pasa la coleccion de empleados
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        //se obtiene todas las areas y roles para los campos de seleccion del formulario
        $areas = Area::all();
        $roles = Rol::all();
        
        //se retorna la vista 'empleados.create' con los datos necesarios
        return view('empleados.create', compact('areas', 'roles'));
    }

    // app/Http/Controllers/EmpleadoController.php

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
        'email' => 'required|email|unique:empleados,email',
        'sexo' => 'required|in:M,F',
        'area_id' => 'required|exists:areas,id',
        'boletin' => 'nullable|boolean', // Esto es correcto
        'descripcion' => 'required|string'
    ]); 
    
    // Se crea un nuevo empleado con los datos del formulario.
    
    $datos = $request->all();
    $datos['boletin'] = $request->has('boletin');
    
    $empleado = Empleado::create($datos);

    // Se sincronizan los roles del empleado con los seleccionados
    // si el campo 'roles' no existe, se usa un array vacio
    $empleado->roles()->sync($request->input('roles', []));

    // Se redirige al listado con un mensaje de exito
    return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente.');
}
    public function edit(Empleado $empleado) // Aqui se inyecta el modelo Empleado
    {
        // Se cargan las areas y roles para el formulario de edicion
        $areas = Area::all();
        $roles = Rol::all();
        
        // Se retorna la vista 'empleados.edit' y se pasa el empleado junto con las areas y roles
        return view('empleados.edit', compact('empleado', 'areas', 'roles'));
    }
    
    public function update(Request $request, Empleado $empleado) //Aqui se inyecta el modelo Empleado
    {
        $request->validate([
            'nombre' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:empleados,email,' . $empleado->id,
            'sexo' => 'required|in:M,F',
            'area_id' => 'required|exists:areas,id',
            'boletin' => 'nullable|boolean',
            'descripcion' => 'required|string'
        ]);
        
        // Actualiza el empleado con los nuevos datos
        $empleado->update($request->all());
        
        // Sincroniza los roles del empleado con los seleccionados
        $empleado->roles()->sync($request->input('roles', []));
        
        // Redirige al listado de empleados con un mensaje de exito
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente.');
    }
    
    public function destroy(Empleado $empleado) // Aque se inyecta el modelo Empleado
    {
        // se desconecta los roles del empleado antes de eliminarlo
        $empleado->roles()->detach();
        
        // Elimina el empleado
        $empleado->delete();
        
        // Redirige con un mensaje de exito
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}