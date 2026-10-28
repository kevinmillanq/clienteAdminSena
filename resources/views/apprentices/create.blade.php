@extends('layouts.app')

@section('content')
    <h1>Crear Aprendiz</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('apprentices.store') }}" method="POST">
        @csrf

        <label>
            Nombre:
            <br>
            <input type="text" name="name" class="form-control" required>
        </label>
        <br><br>

        <label>
            Email:
            <br>
            <input type="email" name="email" class="form-control" required>
        </label>
        <br><br>

        <label>
            Número de Celular:
            <br>
            <input type="text" name="cell_number" class="form-control" required>
        </label>
        <br><br>

        <div class="mb-3">
            <label for="course_id" class="form-label">Seleccionar Curso:</label>
            <br>
            <select name="course_id" id="course_id" class="form-select" required>
                <option value="">Seleccione un curso</option>
                @foreach ($courses as $course)
                    <option value="{{ $course['id'] }}">
                        {{ $course['course_name'] ?? $course['course_number'] ?? $course['id'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>

        <div class="mb-3">
            <label for="computer_id" class="form-label">Seleccionar Equipo:</label>
            <br>
            <select name="computer_id" id="computer_id" class="form-select" required>
                <option value="">Seleccione un equipo</option>
                @foreach ($computers as $comp)
                    <option value="{{ $comp['id'] }}">
                        #{{ $comp['number'] }} - {{ $comp['brand'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>

        <button type="submit" class="btn btn-outline-success btn-sm">Enviar Formulario:</button>
        <a href="{{ route('apprentices.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
    </form>
@endsection