@extends('layouts.app')

@section('title', 'AdminSena')

@section('content')

    <div class="p-4 mb-4 bg-white rounded-3 shadow-sm">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-6 fw-bold text-success">Sistema de información AdminSena</h1>
                <p class="lead text-secondary">
                    Consulta las áreas, los centros de formación, los docentes, los cursos, los equipos
                    de cómputo y los aprendices registrados en el sistema.
                </p>
                <a href="{{ route('apprentices.index') }}" class="btn btn-success">Ver aprendices</a>
                <a href="{{ route('courses.index') }}" class="btn btn-outline-success">Ver cursos</a>
            </div>
            <div class="col-lg-4">
                <div class="row text-center g-3">
                    <div class="col-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h3 class="text-success mb-0">{{ count($areas) }}</h3>
                                <small class="text-secondary">Áreas</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h3 class="text-success mb-0">{{ count($teachers) }}</h3>
                                <small class="text-secondary">Docentes</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h3 class="text-success mb-0">{{ count($courses) }}</h3>
                                <small class="text-secondary">Cursos</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h3 class="text-success mb-0">{{ count($apprentices) }}</h3>
                                <small class="text-secondary">Aprendices</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
