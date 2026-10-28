@extends('layouts.app')

@section('content')
    <h1>Crear Equipo</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('computers.store') }}" method="POST">
        @csrf

        <label>
            Número:
            <br>
            <input type="text" name="number" class="form-control" required>
        </label>
        <br><br>

        <label>
            Marca:
            <br>
            <input type="text" name="brand" class="form-control" required>
        </label>
        <br><br>

        <button type="submit" class="btn btn-outline-success btn-sm">Enviar Formulario:</button>
        <a href="{{ route('computers.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
    </form>
@endsection