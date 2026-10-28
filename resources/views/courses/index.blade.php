@extends('layouts.app')

@section('content')
    <h1>Lista de Cursos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @php
        $areaMap = collect($areas ?? [])->pluck('name', 'id')->toArray();
        $centerMap = collect($trainingCenters ?? [])->pluck('name', 'id')->toArray();
    @endphp

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>id</th>
                <th>course_name</th>
                <th>day</th>
                <th>&Aacute;rea</th>
                <th>Centro de Formaci&oacute;n</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($courses as $course)
                <tr>
                    <td>{{ $course['id'] }}</td>
                    <td>{{ $course['course_name'] ?? $course['course_number'] ?? '' }}</td>
                    <td>{{ $course['day'] }}</td>
                    <td>{{ $areaMap[$course['area_id']] ?? $course['area_id'] }}</td>
                    <td>{{ $centerMap[$course['training_center_id']] ?? $course['training_center_id'] }}</td>
                    <td>
                        <a href="{{ route('courses.create') }}" class="btn btn-outline-success btn-sm">Crear</a>
                        <a href="{{ route('courses.show', $course['id']) }}" class="btn btn-info btn-sm">Ver m&aacute;s</a>
                        <a href="{{ route('courses.edit', $course['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        No hay registros.
                        <a href="{{ route('courses.create') }}" class="btn btn-outline-success btn-sm ms-2">Crear</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
