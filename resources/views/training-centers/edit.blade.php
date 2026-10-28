@extends('layouts.app')

@section('content')
    <h1>Editar Centro de Formación</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('training-centers.update', $trainingCenter['id'] ?? 1) }}" method="POST">
        @csrf
        @method('PUT')

        <label>
            Nombre:
            <br>
            <input type="text" name="name" class="form-control" value="{{ $trainingCenter['name'] ?? '' }}" required>
        </label>
        <br><br>

        <label>
            Ubicación:
            <br>
            <input type="text" name="location" class="form-control" value="{{ $trainingCenter['location'] ?? '' }}" required>
        </label>
        <br><br>

        <button type="submit" class="btn btn-outline-success btn-sm">Guardar Cambios:</button>
        <a href="{{ route('training-centers.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
    </form>
@endsection