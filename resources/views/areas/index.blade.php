@extends('layouts.app')

@section('title', 'Áreas')

@section('content')
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Lista de Áreas</h1>
            <a href="{{ route('areas.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> + Crear Nueva Área (POST)
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 80px;">id</th>
                        <th>name</th>
                        <th style="width: 220px;" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($areas as $area)
                        <tr>
                            <td>{{ $area['id'] }}</td>
                            <td>{{ $area['name'] }}</td>
                            <td class="text-center">
                                <a href="{{ route('areas.show', $area['id']) }}" class="btn btn-info btn-sm text-white">
                                    Ver más
                                </a>
                                <a href="{{ route('areas.edit', $area['id']) }}" class="btn btn-warning btn-sm">
                                    Editar (PUT)
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">No hay áreas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection