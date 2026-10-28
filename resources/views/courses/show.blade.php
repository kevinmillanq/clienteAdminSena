@extends('layouts.app')

@section('content')
    <h1>Detalle del Curso</h1>

    @if(isset($course) && isset($course['id']))
        @php
            $areaMap = collect($areas ?? [])->pluck('name', 'id')->toArray();
            $centerMap = collect($trainingCenters ?? [])->pluck('name', 'id')->toArray();
        @endphp

        <table class="table table-bordered" style="max-width: 600px;">
            <tr>
                <th style="width: 200px;">ID:</th>
                <td>{{ $course['id'] }}</td>
            </tr>
            <tr>
                <th>Nombre / Número:</th>
                <td>{{ $course['course_name'] ?? $course['course_number'] ?? '' }}</td>
            </tr>
            <tr>
                <th>Día / Jornada:</th>
                <td>{{ $course['day'] }}</td>
            </tr>
            <tr>
                <th>Área:</th>
                <td>{{ $areaMap[$course['area_id']] ?? $course['area_id'] }}</td>
            </tr>
            <tr>
                <th>Centro de Formación:</th>
                <td>{{ $centerMap[$course['training_center_id']] ?? $course['training_center_id'] }}</td>
            </tr>
        </table>

        <a href="{{ route('courses.edit', $course['id']) }}" class="btn btn-warning btn-sm">Editar</a>
    @else
        <p>No se encontró la información del curso.</p>
    @endif

    <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
@endsection