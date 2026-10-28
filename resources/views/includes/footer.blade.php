<footer class="bg-dark text-white py-4 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h5 class="mb-0">AdminSena</h5>
            </div>
            <div class="col-md-6 text-md-end">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a class="footer-link" href="{{ route('areas.index') }}">&Aacute;reas</a></li>
                    <li class="list-inline-item"><a class="footer-link" href="{{ route('training-centers.index') }}">Centros</a></li>
                    <li class="list-inline-item"><a class="footer-link" href="{{ route('teachers.index') }}">Docentes</a></li>
                    <li class="list-inline-item"><a class="footer-link" href="{{ route('courses.index') }}">Cursos</a></li>
                    <li class="list-inline-item"><a class="footer-link" href="{{ route('computers.index') }}">Equipos</a></li>
                    <li class="list-inline-item"><a class="footer-link" href="{{ route('apprentices.index') }}">Aprendices</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="text-center mb-0">&copy; {{ date('Y') }} AdminSena. Todos los derechos reservados.</p>
    </div>
</footer>