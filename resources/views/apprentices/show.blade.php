@php
    $courseNumbers = collect($courses)->pluck('course_number', 'id');
    $computerNumbers = collect($computers)->pluck('number', 'id');
@endphp

@extends('layouts.app')

@section('title', 'Aprendiz')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles del Aprendiz</h2>

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
                    <td>{{ $apprentice['id'] ?? '' }}</td>
                </tr>
                <tr>
                    <td>name</td>
                    <td>{{ $apprentice['name'] ?? '' }}</td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>{{ $apprentice['email'] ?? '' }}</td>
                </tr>
                <tr>
                    <td>cell_number</td>
                    <td>{{ $apprentice['cell_number'] ?? '' }}</td>
                </tr>
                <tr>
                    <td>course_id</td>
                    <td>{{ $apprentice['course_id'] ?? '' }} — {{ $courseNumbers[$apprentice['course_id'] ?? 0] ?? '' }}</td>
                </tr>
                <tr>
                    <td>computer_id</td>
                    <td>{{ $apprentice['computer_id'] ?? '' }} — {{ $computerNumbers[$apprentice['computer_id'] ?? 0] ?? '' }}</td>
                </tr>
                <tr>
                    <td>created_at</td>
                    <td>{{ $apprentice['created_at'] ?? '' }}</td>
                </tr>
                <tr>
                    <td>updated_at</td>
                    <td>{{ $apprentice['updated_at'] ?? '' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <a href="{{ route('apprentices.index') }}" class="btn btn-outline-success">Volver al listado</a>
</div>
@endsection
