@php
    $areaNames = collect($areas)->pluck('name', 'id');
    $centerNames = collect($trainingCenters)->pluck('name', 'id');
@endphp

@extends('layouts.app')

@section('title', 'Docente')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles del Docente</h2>

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
                    <td>{{ $teacher['id'] ?? '' }}</td>
                </tr>
                <tr>
                    <td>name</td>
                    <td>{{ $teacher['name'] ?? '' }}</td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>{{ $teacher['email'] ?? '' }}</td>
                </tr>
                <tr>
                    <td>area_id</td>
                    <td>{{ $teacher['area_id'] ?? '' }} — {{ $areaNames[$teacher['area_id'] ?? 0] ?? '' }}</td>
                </tr>
                <tr>
                    <td>training_center_id</td>
                    <td>{{ $teacher['training_center_id'] ?? '' }} — {{ $centerNames[$teacher['training_center_id'] ?? 0] ?? '' }}</td>
                </tr>
                <tr>
                    <td>created_at</td>
                    <td>{{ $teacher['created_at'] ?? '' }}</td>
                </tr>
                <tr>
                    <td>updated_at</td>
                    <td>{{ $teacher['updated_at'] ?? '' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <a href="{{ route('teachers.index') }}" class="btn btn-outline-success">Volver al listado</a>
</div>
@endsection
