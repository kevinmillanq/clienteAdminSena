@extends('layouts.app')

@section('content')
    <h1>Editar Docente</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('teachers.update', $teacher['id'] ?? 1) }}" method="POST">
        @csrf
        @method('PUT')

        <label>
            Nombre:
            <br>
            <input type="text" name="name" class="form-control" value="{{ $teacher['name'] ?? '' }}" required>
        </label>
        <br><br>

        <label>
            Email:
            <br>
            <input type="email" name="email" class="form-control" value="{{ $teacher['email'] ?? '' }}" required>
        </label>
        <br><br>

        <div class="mb-3">
            <label for="area_id" class="form-label">Seleccionar Área:</label>
            <br>
            <select name="area_id" id="area_id" class="form-select" required>
                <option value="">Seleccione un área</option>
                @foreach ($areas as $area)
                    <option value="{{ $area['id'] }}" {{ ($teacher['area_id'] ?? '') == $area['id'] ? 'selected' : '' }}>
                        {{ $area['name'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>

        <div class="mb-3">
            <label for="training_center_id" class="form-label">Seleccionar Centro de Formación:</label>
            <br>
            <select name="training_center_id" id="training_center_id" class="form-select" required>
                <option value="">Seleccione un centro</option>
                @foreach ($trainingCenters as $center)
                    <option value="{{ $center['id'] }}" {{ ($teacher['training_center_id'] ?? '') == $center['id'] ? 'selected' : '' }}>
                        {{ $center['name'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>

        <button type="submit" class="btn btn-outline-success btn-sm">Guardar Cambios:</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
    </form>
@endsection