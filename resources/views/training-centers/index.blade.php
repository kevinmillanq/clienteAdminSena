@extends('layouts.app')

@section('title', 'Centros de formación')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Centros de Formación</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>location</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trainingCenters as $trainingCenter)
                        <tr>
                            <td>{{ $trainingCenter['id'] }}</td>
                            <td>{{ $trainingCenter['name'] }}</td>
                            <td>{{ $trainingCenter['location'] }}</td>
                            <td>
                                <a href="{{ route('training-centers.show', $trainingCenter['id']) }}" class="btn btn-info btn-sm">Ver más</a>
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
