@extends('layouts.app')

@section('content')
    <h1>Lista de &Aacute;reas</h1>

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
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($areas as $area)
                <tr>
                    <td>{{ $area['id'] }}</td>
                    <td>{{ $area['name'] }}</td>
                    <td>
                        <a href="{{ route('areas.create') }}" class="btn btn-outline-success btn-sm">Crear</a>
                        <a href="{{ route('areas.show', $area['id']) }}" class="btn btn-info btn-sm">Ver m&aacute;s</a>
                        <a href="{{ route('areas.edit', $area['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">
                        No hay registros.
                        <a href="{{ route('areas.create') }}" class="btn btn-outline-success btn-sm ms-2">Crear</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
