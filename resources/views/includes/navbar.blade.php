<nav class="navbar navbar-expand-lg navbar-light" style="background-color: white; border-bottom: 4px solid #28a745;">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <span class="logo">AdminSena</span>
        </a>
        <!-- Botón de menú -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Menú de navegación -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('areas.*') ? 'active' : '' }}" href="{{ route('areas.index') }}">Áreas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('training-centers.*') ? 'active' : '' }}" href="{{ route('training-centers.index') }}">Centros de formación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('teachers.*') ? 'active' : '' }}" href="{{ route('teachers.index') }}">Docentes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('courses.*') ? 'active' : '' }}" href="{{ route('courses.index') }}">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('computers.*') ? 'active' : '' }}" href="{{ route('computers.index') }}">Equipos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('apprentices.*') ? 'active' : '' }}" href="{{ route('apprentices.index') }}">Aprendices</a>
                </li>
            </ul>
            <span class="navbar-text api-url ms-3">
                API: {{ env('URL_SERVER_API') }}
            </span>
        </div>
    </div>
</nav>