@extends('layouts.app')

@section('content')
    <h1>Detalle del Aprendiz</h1>

    @if(isset($apprentice) && isset($apprentice['id']))
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

        <table class="table table-bordered" style="max-width: 600px;">
            <tr>
                <th style="width: 200px;">ID:</th>
                <td>{{ $apprentice['id'] }}</td>
            </tr>
            <tr>
                <th>Nombre:</th>
                <td>{{ $apprentice['name'] }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $apprentice['email'] }}</td>
            </tr>
            <tr>
                <th>Celular:</th>
                <td>{{ $apprentice['cell_number'] ?? '' }}</td>
            </tr>
            <tr>
                <th>Curso:</th>
                <td>{{ $courseMap[$apprentice['course_id']] ?? $apprentice['course_id'] }}</td>
            </tr>
            <tr>
                <th>Equipo:</th>
                <td>{{ $compMap[$apprentice['computer_id']] ?? $apprentice['computer_id'] }}</td>
            </tr>
        </table>

        <a href="{{ route('apprentices.edit', $apprentice['id']) }}" class="btn btn-warning btn-sm">Editar</a>
    @else
        <p>No se encontró la información del aprendiz.</p>
    @endif

    <a href="{{ route('apprentices.index') }}" class="btn btn-outline-secondary btn-sm">Volver</a>
@endsection