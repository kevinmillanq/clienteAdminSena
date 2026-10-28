@extends('layouts.app')

@section('content')
    <h1>Detalle del Docente</h1>

    @if(isset($teacher) && isset($teacher['id']))
        @php
            $areaMap = collect($areas ?? [])->pluck('name', 'id')->toArray();
            $centerMap = collect($trainingCenters ?? [])->pluck('name', 'id')->toArray();
        @endphp

        <table class="table table-bordered" style="max-width: 600px;">
            <tr>
                <th style="width: 200px;">ID:</th>
                <td>{{ $teacher['id'] }}</td>
            </tr>
            <tr>
                <th>Nombre:</th>
                <td>{{ $teacher['name'] }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $teacher['email'] }}</td>
            </tr>
            <tr>
                <th>Área:</th>
                <td>{{ $areaMap[$teacher['area_id']] ?? $teacher['area_id'] }}</td>
            </tr>
            <tr>
                <th>Centro de Formación:</th>
                <td>{{ $centerMap[$teacher['training_center_id']] ?? $teacher['training_center_id'] }}</td>
            </tr>
        </table>

        <a href="{{ route('teachers.edit', $teacher['id']) }}" class="btn btn-warning btn-sm">Editar</a>
    @else
        <p>No se encontró la información del docente.</p>
    @endif

    <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
@endsection