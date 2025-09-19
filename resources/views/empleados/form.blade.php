<form action="{{ $empleado->exists ? route('empleados.update', $empleado) : route('empleados.store') }}" method="POST">
    @csrf
    @if ($empleado->exists)
        @method('PUT')
    @endif
    
    <label for="nombre">Nombre completo *</label>
    <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $empleado->nombre) }}" required>
    @error('nombre')<span>{{ $message }}</span>@enderror
    
    <label for="email">Correo electrónico *</label>
    <input type="email" name="email" id="email" value="{{ old('email', $empleado->email) }}" required>
    @error('email')<span>{{ $message }}</span>@enderror
    
    <label>Sexo *</label>
    <input type="radio" name="sexo" value="M" {{ old('sexo', $empleado->sexo) == 'M' ? 'checked' : '' }} required> Masculino
    <input type="radio" name="sexo" value="F" {{ old('sexo', $empleado->sexo) == 'F' ? 'checked' : '' }}> Femenino
    @error('sexo')<span>{{ $message }}</span>@enderror

    <label for="area_id">Área *</label>
    <select name="area_id" id="area_id" required>
        @foreach ($areas as $area)
            <option value="{{ $area->id }}" {{ old('area_id', $empleado->area_id) == $area->id ? 'selected' : '' }}>{{ $area->nombre }}</option>
        @endforeach
    </select>
    @error('area_id')<span>{{ $message }}</span>@enderror

    <label for="descripcion">Descripción *</label>
    <textarea name="descripcion" id="descripcion" required>{{ old('descripcion', $empleado->descripcion) }}</textarea>
    @error('descripcion')<span>{{ $message }}</span>@enderror

    <label>
        <input type="checkbox" name="boletin" value="1" {{ old('boletin', $empleado->boletin) == 1 ? 'checked' : '' }}>
        Deseo recibir boletín informativo
    </label>

    <label>Roles *</label>
    @foreach ($roles as $rol)
        <label>
            <input type="checkbox" name="roles[]" value="{{ $rol->id }}" {{ in_array($rol->id, old('roles', $empleado->roles->pluck('id')->toArray())) ? 'checked' : '' }}>
            {{ $rol->nombre }}
        </label>
    @endforeach
    @error('roles')<span>{{ $message }}</span>@enderror

    <button type="submit">Guardar</button>
</form>