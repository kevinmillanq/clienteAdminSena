@extends('layouts.app')

@section('content')
    <h1>Lista de Centros de Formaci&oacute;n</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>location</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trainingCenters as $center)
                <tr>
                    <td>{{ $center['id'] }}</td>
                    <td>{{ $center['name'] }}</td>
                    <td>{{ $center['location'] ?? '' }}</td>
                    <td>
                        <a href="{{ route('training-centers.create') }}" class="btn btn-outline-success btn-sm">Crear</a>
                        <a href="{{ route('training-centers.show', $center['id']) }}" class="btn btn-info btn-sm">Ver m&aacute;s</a>
                        <a href="{{ route('training-centers.edit', $center['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        No hay registros.
                        <a href="{{ route('training-centers.create') }}" class="btn btn-outline-success btn-sm ms-2">Crear</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
