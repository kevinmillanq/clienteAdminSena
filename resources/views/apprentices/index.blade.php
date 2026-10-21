@php
    $courseNumbers = collect($courses)->pluck('course_number', 'id');
    $computerNumbers = collect($computers)->pluck('number', 'id');
@endphp

@extends('layouts.app')

@section('title', 'Aprendices')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Aprendices</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>cell_number</th>
                        <th>course_id</th>
                        <th>computer_id</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($apprentices as $apprentice)
                        <tr>
                            <td>{{ $apprentice['id'] }}</td>
                            <td>{{ $apprentice['name'] }}</td>
                            <td>{{ $apprentice['email'] }}</td>
                            <td>{{ $apprentice['cell_number'] }}</td>
                            <td>{{ $apprentice['course_id'] }} <span class="badge bg-light text-dark">{{ $courseNumbers[$apprentice['course_id']] ?? '' }}</span></td>
                            <td>{{ $apprentice['computer_id'] }} <span class="badge bg-light text-dark">{{ $computerNumbers[$apprentice['computer_id']] ?? '' }}</span></td>
                            <td>
                                <a href="{{ route('apprentices.show', $apprentice['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No hay registros.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
