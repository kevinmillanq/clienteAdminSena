<!-- Footer -->
<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>AdminSena</h5>
                <p>Frontend del sistema de información del SENA<br>
                    Datos de áreas, centros de formación, docentes, cursos, equipos de cómputo y aprendices.</p>
            </div>
            <div class="col-md-6">
                <h5>Módulos</h5>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a class="footer-link" href="{{ route('teachers.index') }}">Docentes</a></li>
                    <li class="list-inline-item"><a class="footer-link" href="{{ route('courses.index') }}">Cursos</a></li>
                    <li class="list-inline-item"><a class="footer-link" href="{{ route('apprentices.index') }}">Aprendices</a></li>
                    <li class="list-inline-item"><a class="footer-link" href="{{ route('computers.index') }}">Equipos</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="text-center">&copy; {{ date('Y') }} AdminSena. Todos los derechos reservados.</p>
    </div>
</footer>
