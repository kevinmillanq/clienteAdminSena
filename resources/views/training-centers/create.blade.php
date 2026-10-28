@extends('layouts.app')

@section('content')
    <h1>Crear Centro de Formación</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('training-centers.store') }}" method="POST">
        @csrf

        <label>
            Nombre:
            <br>
            <input type="text" name="name" class="form-control" required>
        </label>
        <br><br>

        <label>
            Ubicación:
            <br>
            <input type="text" name="location" class="form-control" required>
        </label>
        <br><br>

        <button type="submit" class="btn btn-outline-success btn-sm">Enviar Formulario:</button>
        <a href="{{ route('training-centers.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
    </form>
@endsection