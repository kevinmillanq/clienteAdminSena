@extends('layouts.app')

@section('content')
    <h1>Detalle del Centro de Formación</h1>

    @if(isset($trainingCenter) && isset($trainingCenter['id']))
        <table class="table table-bordered" style="max-width: 500px;">
            <tr>
                <th style="width: 150px;">ID:</th>
                <td>{{ $trainingCenter['id'] }}</td>
            </tr>
            <tr>
                <th>Nombre:</th>
                <td>{{ $trainingCenter['name'] }}</td>
            </tr>
            <tr>
                <th>Ubicación:</th>
                <td>{{ $trainingCenter['location'] ?? '' }}</td>
            </tr>
        </table>

        <a href="{{ route('training-centers.edit', $trainingCenter['id']) }}" class="btn btn-warning btn-sm">Editar</a>
    @else
        <p>No se encontró la información del centro.</p>
    @endif

    <a href="{{ route('training-centers.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
@endsection