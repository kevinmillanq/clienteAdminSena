@extends('layouts.app')

@section('title', 'AdminSena')

@section('content')
    <h1 class="mb-3">Sistema de Información AdminSena</h1>
    <p class="lead text-secondary">
        Consulta y gestiona las áreas, centros de formación, docentes, cursos, equipos de cómputo y aprendices registrados en el sistema.
    </p>

    <hr class="my-4">

    <div class="row g-3">
        <div class="col-md-4">
            <div class="border p-3 rounded">
                <h4>Áreas</h4>
                <p class="text-muted">Total: {{ count($areas ?? []) }}</p>
                <a href="{{ route('areas.index') }}" class="btn btn-outline-success btn-sm">Ver Áreas</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="border p-3 rounded">
                <h4>Centros de Formación</h4>
                <p class="text-muted">Total: {{ count($trainingCenters ?? []) }}</p>
                <a href="{{ route('training-centers.index') }}" class="btn btn-outline-success btn-sm">Ver Centros</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="border p-3 rounded">
                <h4>Docentes</h4>
                <p class="text-muted">Total: {{ count($teachers ?? []) }}</p>
                <a href="{{ route('teachers.index') }}" class="btn btn-outline-success btn-sm">Ver Docentes</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="border p-3 rounded">
                <h4>Cursos</h4>
                <p class="text-muted">Total: {{ count($courses ?? []) }}</p>
                <a href="{{ route('courses.index') }}" class="btn btn-outline-success btn-sm">Ver Cursos</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="border p-3 rounded">
                <h4>Equipos</h4>
                <p class="text-muted">Total: {{ count($computers ?? []) }}</p>
                <a href="{{ route('computers.index') }}" class="btn btn-outline-success btn-sm">Ver Equipos</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="border p-3 rounded">
                <h4>Aprendices</h4>
                <p class="text-muted">Total: {{ count($apprentices ?? []) }}</p>
                <a href="{{ route('apprentices.index') }}" class="btn btn-outline-success btn-sm">Ver Aprendices</a>
            </div>
        </div>
    </div>
@endsection