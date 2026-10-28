@extends('layouts.app')

@section('content')
    <h1>Crear Curso</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <label>
            Nombre / Número de Curso:
            <br>
            <input type="text" name="course_name" class="form-control" required>
        </label>
        <br><br>

        <label>
            Día / Jornada:
            <br>
            <input type="text" name="day" class="form-control" required>
        </label>
        <br><br>

        <div class="mb-3">
            <label for="area_id" class="form-label">Seleccionar Área:</label>
            <br>
            <select name="area_id" id="area_id" class="form-select" required>
                <option value="">Seleccione un área</option>
                @foreach ($areas as $area)
                    <option value="{{ $area['id'] }}">{{ $area['name'] }}</option>
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
                    <option value="{{ $center['id'] }}">{{ $center['name'] }}</option>
                @endforeach
            </select>
        </div>
        <br>

        <button type="submit" class="btn btn-outline-success btn-sm">Enviar Formulario:</button>
        <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
    </form>
@endsection