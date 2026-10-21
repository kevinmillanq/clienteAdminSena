@extends('layouts.app')

@section('title', 'Centro de formación')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles del Centro de Formación</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">location</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trainingCenter as $key => $value)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $value }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('training-centers.index') }}" class="btn btn-outline-success">Volver al listado</a>
</div>
@endsection
