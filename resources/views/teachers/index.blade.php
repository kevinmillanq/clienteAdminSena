@extends('layouts.app')

@section('content')
    <h1>Lista de Docentes</h1>

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
                <th>Nombre</th>
                <th>Email</th>
                <th>&Aacute;rea</th>
                <th>Centro de Formaci&oacute;n</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher['id'] }}</td>
                    <td>{{ $teacher['name'] }}</td>
                    <td>{{ $teacher['email'] }}</td>
                    <td>{{ $areaMap[$teacher['area_id']] ?? $teacher['area_id'] }}</td>
                    <td>{{ $centerMap[$teacher['training_center_id']] ?? $teacher['training_center_id'] }}</td>
                    <td>
                        <a href="{{ route('teachers.create') }}" class="btn btn-outline-success btn-sm">Crear</a>
                        <a href="{{ route('teachers.show', $teacher['id']) }}" class="btn btn-info btn-sm">Ver m&aacute;s</a>
                        <a href="{{ route('teachers.edit', $teacher['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        No hay registros.
                        <a href="{{ route('teachers.create') }}" class="btn btn-outline-success btn-sm ms-2">Crear</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
