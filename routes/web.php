<?php

use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;

// Ruta principal para mostrar la lista de empleados
Route::get('/', [EmpleadoController::class, 'index'])->name('empleados.index');

// Rutas de tipo resource para CRUD de empleados
Route::resource('empleados', EmpleadoController::class);