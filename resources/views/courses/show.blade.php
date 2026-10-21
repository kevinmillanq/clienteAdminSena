@php
    $areaNames = collect($areas)->pluck('name', 'id');
    $centerNames = collect($trainingCenters)->pluck('name', 'id');
@endphp

@extends('layouts.app')

@section('title', 'Curso')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles del Curso</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th scope="col">Atributo</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>id</td>
                    <td>{{ $course['id'] ?? '' }}</td>
                </tr>
                <tr>
                    <td>course_number</td>
                    <td>{{ $course['course_number'] ?? '' }}</td>
                </tr>
                <tr>
                    <td>day</td>
                    <td>{{ $course['day'] ?? '' }}</td>
                </tr>
                <tr>
                    <td>area_id</td>
                    <td>{{ $course['area_id'] ?? '' }} — {{ $areaNames[$course['area_id'] ?? 0] ?? '' }}</td>
                </tr>
                <tr>
                    <td>training_center_id</td>
                    <td>{{ $course['training_center_id'] ?? '' }} — {{ $centerNames[$course['training_center_id'] ?? 0] ?? '' }}</td>
                </tr>
                <tr>
                    <td>created_at</td>
                    <td>{{ $course['created_at'] ?? '' }}</td>
                </tr>
                <tr>
                    <td>updated_at</td>
                    <td>{{ $course['updated_at'] ?? '' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <a href="{{ route('courses.index') }}" class="btn btn-outline-success">Volver al listado</a>
</div>
@endsection
