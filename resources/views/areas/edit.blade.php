@extends('layouts.app')

@section('content')
    <h1>Editar Área</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('areas.update', $area['id'] ?? 1) }}" method="POST">
        @csrf
        @method('PUT')

        <label>
            Nombre:
            <br>
            <input type="text" name="name" class="form-control" value="{{ $area['name'] ?? '' }}" required>
        </label>
        <br><br>

        <button type="submit" class="btn btn-outline-success btn-sm">Guardar Cambios:</button>
        <a href="{{ route('areas.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
    </form>
@endsection