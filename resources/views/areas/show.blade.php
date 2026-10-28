@extends('layouts.app')

@section('content')
    <h1>Detalle del Área</h1>

    @if(isset($area) && isset($area['id']))
        <table class="table table-bordered" style="max-width: 500px;">
            <tr>
                <th style="width: 150px;">ID:</th>
                <td>{{ $area['id'] }}</td>
            </tr>
            <tr>
                <th>Nombre:</th>
                <td>{{ $area['name'] }}</td>
            </tr>
        </table>

        <a href="{{ route('areas.edit', $area['id']) }}" class="btn btn-warning btn-sm">Editar</a>
    @else
        <p>No se encontró la información del área.</p>
    @endif

    <a href="{{ route('areas.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
@endsection