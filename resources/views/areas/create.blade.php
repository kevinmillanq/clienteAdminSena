@extends('layouts.app')

@section('content')
    <h1>Crear Área</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('areas.store') }}" method="POST">
        @csrf

        <label>
            Nombre:
            <br>
            <input type="text" name="name" class="form-control" required>
        </label>
        <br><br>

        <button type="submit" class="btn btn-outline-success btn-sm">Enviar Formulario:</button>
        <a href="{{ route('areas.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
    </form>
@endsection