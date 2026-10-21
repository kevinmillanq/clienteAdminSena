@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Area</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success')}}
</div>
    @endif

    <form action="{{ route('areas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Area:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-outline-success">Enviar Formulario</button>
    </form>
</div>
@endsection