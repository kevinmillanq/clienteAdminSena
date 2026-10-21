@php
    $areaNames = collect($areas)->pluck('name', 'id');
    $centerNames = collect($trainingCenters)->pluck('name', 'id');
@endphp

@extends('layouts.app')

@section('title', 'Cursos')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Cursos</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>course_number</th>
                        <th>day</th>
                        <th>area_id</th>
                        <th>training_center_id</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td>{{ $course['id'] }}</td>
                            <td>{{ $course['course_number'] }}</td>
                            <td>{{ $course['day'] }}</td>
                            <td>{{ $course['area_id'] }} <span class="badge bg-light text-dark">{{ $areaNames[$course['area_id']] ?? '' }}</span></td>
                            <td>{{ $course['training_center_id'] }} <span class="badge bg-light text-dark">{{ $centerNames[$course['training_center_id']] ?? '' }}</span></td>
                            <td>
                                <a href="{{ route('courses.show', $course['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay registros.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
