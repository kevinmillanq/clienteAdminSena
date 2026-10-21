@extends('layouts.app')

@section('title', 'Equipos de cómputo')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Equipos de Cómputo</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
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
                                <a href="{{ route('computers.show', $computer['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay registros.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
