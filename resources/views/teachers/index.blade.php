@php
    $areaNames = collect($areas)->pluck('name', 'id');
    $centerNames = collect($trainingCenters)->pluck('name', 'id');
@endphp

@extends('layouts.app')

@section('title', 'Docentes')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Docentes</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>area_id</th>
                        <th>training_center_id</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher['id'] }}</td>
                            <td>{{ $teacher['name'] }}</td>
                            <td>{{ $teacher['email'] }}</td>
                            <td>{{ $teacher['area_id'] }} <span class="badge bg-light text-dark">{{ $areaNames[$teacher['area_id']] ?? '' }}</span></td>
                            <td>{{ $teacher['training_center_id'] }} <span class="badge bg-light text-dark">{{ $centerNames[$teacher['training_center_id']] ?? '' }}</span></td>
                            <td>
                                <a href="{{ route('teachers.show', $teacher['id']) }}" class="btn btn-info btn-sm">Ver más</a>
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
