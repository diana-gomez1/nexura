@extends('layouts.app')

@section('title', 'Crear empleado')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-light">
        <h3 class="mb-0">Crear empleado</h3>
    </div>
    <div class="card-body">
        
        {{-- Nota de campos obligatorios --}}
        <div class="alert alert-info py-2">
            Los campos con asteriscos (<span class="text-danger">*</span>) son obligatorios
        </div>

        {{-- Formulario --}}
        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf

            {{-- Nombre --}}
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo <span class="text-danger">*</span></label>
                <input type="text" name="nombre" id="nombre" 
                       class="form-control" placeholder="Nombre completo del empleado"
                       value="{{ old('nombre') }}" required>
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" 
                       class="form-control" placeholder="Correo electrónico"
                       value="{{ old('email') }}" required>
            </div>

            {{-- Sexo --}}
            <div class="mb-3">
                <label class="form-label">Sexo <span class="text-danger">*</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="sexoM" value="M" {{ old('sexo') === 'M' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="sexoM">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="sexoF" value="F" {{ old('sexo') === 'F' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="sexoF">Femenino</label>
                    </div>
                </div>
            </div>

            {{-- Área --}}
            <div class="mb-3">
                <label for="area_id" class="form-label">Área <span class="text-danger">*</span></label>
                <select name="area_id" id="area_id" class="form-select" required>
                    <option value="">-- Seleccione un área --</option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
                            {{ $area->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Descripción --}}
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción <span class="text-danger">*</span></label>
                <textarea name="descripcion" id="descripcion" rows="3" 
                          class="form-control" placeholder="Descripción de la experiencia del empleado" required>{{ old('descripcion') }}</textarea>
            </div>

            {{-- Boletín --}}
            <div class="mb-3 form-check">
                <input type="hidden" name="boletin" value="0">
                <input class="form-check-input" type="checkbox" name="boletin" id="boletin" value="1" {{ old('boletin') ? 'checked' : '' }}>
                <label class="form-check-label" for="boletin">Deseo recibir boletín informativo</label>
            </div>

            {{-- Roles --}}
            <div class="mb-3">
                <label class="form-label">Roles <span class="text-danger">*</span></label>
                <div>
                    @foreach($roles as $rol)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="roles[]" id="rol{{ $rol->id }}" value="{{ $rol->id }}"
                                   {{ (is_array(old('roles')) && in_array($rol->id, old('roles'))) ? 'checked' : '' }}>
                            <label class="form-check-label" for="rol{{ $rol->id }}">
                                {{ $rol->nombre }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Botón --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Guardar
                </button>
                <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
