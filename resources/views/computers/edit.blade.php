@extends('layouts.app')

@section('content')
    <h1>Editar Equipo</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('computers.update', $computer['id'] ?? 1) }}" method="POST">
        @csrf
        @method('PUT')

        <label>
            Número:
            <br>
            <input type="text" name="number" class="form-control" value="{{ $computer['number'] ?? '' }}" required>
        </label>
        <br><br>

        <label>
            Marca:
            <br>
            <input type="text" name="brand" class="form-control" value="{{ $computer['brand'] ?? '' }}" required>
        </label>
        <br><br>

        <button type="submit" class="btn btn-outline-success btn-sm">Guardar Cambios:</button>
        <a href="{{ route('computers.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
    </form>
@endsection