@extends('layouts.app')

@section('title', 'Equipo de cómputo')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles del Equipo de Cómputo</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th scope="col">Atributo</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($computer as $key => $value)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $value }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('computers.index') }}" class="btn btn-outline-success">Volver al listado</a>
</div>
@endsection
