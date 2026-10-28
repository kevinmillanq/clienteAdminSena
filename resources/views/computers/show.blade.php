@extends('layouts.app')

@section('content')
    <h1>Detalle del Equipo</h1>

    @if(isset($computer) && isset($computer['id']))
        <table class="table table-bordered" style="max-width: 500px;">
            <tr>
                <th style="width: 150px;">ID:</th>
                <td>{{ $computer['id'] }}</td>
            </tr>
            <tr>
                <th>Número:</th>
                <td>{{ $computer['number'] }}</td>
            </tr>
            <tr>
                <th>Marca:</th>
                <td>{{ $computer['brand'] }}</td>
            </tr>
        </table>

        <a href="{{ route('computers.edit', $computer['id']) }}" class="btn btn-warning btn-sm">Editar</a>
    @else
        <p>No se encontró la información del equipo.</p>
    @endif

    <a href="{{ route('computers.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
@endsection