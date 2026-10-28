@extends('layouts.app')

@section('content')
    <h1>Lista de Aprendices</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @php
        $courseMap = [];
        foreach ($courses ?? [] as $c) {
            $courseMap[$c['id']] = $c['course_name'] ?? $c['course_number'] ?? $c['id'];
        }
        $compMap = [];
        foreach ($computers ?? [] as $eq) {
            $compMap[$eq['id']] = '#' . ($eq['number'] ?? '') . ' - ' . ($eq['brand'] ?? '');
        }
    @endphp

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Curso</th>
                <th>Equipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($apprentices as $apprentice)
                <tr>
                    <td>{{ $apprentice['id'] }}</td>
                    <td>{{ $apprentice['name'] }}</td>
                    <td>{{ $apprentice['email'] }}</td>
                    <td>{{ $apprentice['cell_number'] ?? '' }}</td>
                    <td>{{ $courseMap[$apprentice['course_id']] ?? $apprentice['course_id'] }}</td>
                    <td>{{ $compMap[$apprentice['computer_id']] ?? $apprentice['computer_id'] }}</td>
                    <td>
                        <a href="{{ route('apprentices.create') }}" class="btn btn-outline-success btn-sm">Crear</a>
                        <a href="{{ route('apprentices.show', $apprentice['id']) }}" class="btn btn-info btn-sm">Ver m&aacute;s</a>
                        <a href="{{ route('apprentices.edit', $apprentice['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        No hay registros.
                        <a href="{{ route('apprentices.create') }}" class="btn btn-outline-success btn-sm ms-2">Crear</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
