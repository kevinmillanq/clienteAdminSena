@extends('layouts.app')

@section('title', 'Editar Área')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Editar Área (PUT / UPDATE)</h4>
                    <span class="badge bg-dark">ID: {{ $area['id'] ?? '' }}</span>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if(isset($area) && isset($area['id']))
                        <form action="{{ route('areas.update', $area['id']) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label font-weight-bold">Nombre del Área:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $area['name'] ?? '' }}" required>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('areas.index') }}" class="btn btn-secondary">
                                    Volver al listado
                                </a>
                                <button type="submit" class="btn btn-warning">
                                    Guardar Cambios (PUT)
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-warning">
                            No se pudieron obtener los datos de esta área. Asegúrate de que el servidor backend esté corriendo.
                        </div>
                        <a href="{{ route('areas.index') }}" class="btn btn-secondary">Volver al listado</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection