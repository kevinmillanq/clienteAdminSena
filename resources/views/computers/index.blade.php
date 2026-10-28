@extends('layouts.app')

@section('content')
    <h1>Lista de Equipos</h1>

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
                <th>number</th>
                <th>brand</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($computers as $computer)
                <tr>
                    <td>{{ $computer['id'] }}</td>
                    <td>{{ $computer['number'] }}</td>
                    <td>{{ $computer['brand'] }}</td>
                    <td>
                        <a href="{{ route('computers.create') }}" class="btn btn-outline-success btn-sm">Crear</a>
                        <a href="{{ route('computers.show', $computer['id']) }}" class="btn btn-info btn-sm">Ver m&aacute;s</a>
                        <a href="{{ route('computers.edit', $computer['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        No hay registros.
                        <a href="{{ route('computers.create') }}" class="btn btn-outline-success btn-sm ms-2">Crear</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
