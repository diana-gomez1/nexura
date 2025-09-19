@extends('layouts.app')

@section('title', 'Lista de empleados')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold"><i class="fa fa-users"></i> Lista de empleados</h2>
    <a href="{{ route('empleados.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Crear
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-bordered table-hover mb-0 align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th><i class="fa fa-user"></i> Nombre</th>
                    <th><i class="fa fa-envelope"></i> Email</th>
                    <th><i class="fa fa-venus-mars"></i> Sexo</th>
                    <th><i class="fa fa-building"></i> Área</th>
                    <th><i class="fa fa-newspaper"></i> Boletín</th>
                    <th><i class="fa fa-gear"></i> Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($empleados as $empleado)
                    <tr>
                        <td class="text-start">{{ $empleado->nombre }}</td>
                        <td class="text-start">{{ $empleado->email }}</td>
                        <td>
                            @if($empleado->sexo === 'M')
                                <span class="badge bg-primary"><i class="fa fa-mars"></i> Masculino</span>
                            @else
                                <span class="badge bg-danger"><i class="fa fa-venus"></i> Femenino</span>
                            @endif
                        </td>
                        <td>{{ $empleado->area->nombre }}</td>
                        <td>
                            @if($empleado->boletin)
                                <span class="badge bg-success"><i class="fa fa-check"></i> Sí</span>
                            @else
                                <span class="badge bg-secondary"><i class="fa fa-times"></i> No</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-sm btn-outline-warning">
                                <i class="fa fa-pen"></i>
                            </a>
                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este empleado?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-muted py-4">
                            <i class="fa fa-circle-info"></i> No hay empleados registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
