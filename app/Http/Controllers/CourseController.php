<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $url;

    public function __construct()
    {
        $this->url = env('URL_SERVER_API', 'http://127.0.0.1:8000/api') . '/courses';
    }

    private function fetchDataFromApi($url)
    {
        try {
            $response = Http::get($url);
            return $response->json() ?? [];
        } catch (\Exception $e) {
            return [];
        }
    }

    public function index()
    {
        $urlBase = env('URL_SERVER_API', 'http://127.0.0.1:8000/api');
        $courses = $this->fetchDataFromApi($this->url);
        $areas = $this->fetchDataFromApi($urlBase . '/areas');
        $trainingCenters = $this->fetchDataFromApi($urlBase . '/training-centers');

        return view('courses.index', compact('courses', 'areas', 'trainingCenters'));
    }

    public function create()
    {
        $urlBase = env('URL_SERVER_API', 'http://127.0.0.1:8000/api');
        $areas = $this->fetchDataFromApi($urlBase . '/areas');
        $trainingCenters = $this->fetchDataFromApi($urlBase . '/training-centers');

        return view('courses.create', compact('areas', 'trainingCenters'));
    }

    public function store(Request $request)
    {
        try {
            $name = $request->course_name ?? $request->course_number;
            $response = Http::post($this->url, [
                'course_name' => $name,
                'course_number' => $name,
                'day' => $request->day,
                'area_id' => $request->area_id,
                'training_center_id' => $request->training_center_id,
            ]);

            if ($response->successful()) {
                return redirect()->route('courses.index')->with('success', 'Curso creado con éxito');
            }

            return redirect()->back()->with('error', 'Error al guardar el curso en el servidor.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo conectar con el servidor backend.');
        }
    }

    public function show($id)
    {
        $urlBase = env('URL_SERVER_API', 'http://127.0.0.1:8000/api');
        $course = $this->fetchDataFromApi($this->url . '/' . $id);
        $areas = $this->fetchDataFromApi($urlBase . '/areas');
        $trainingCenters = $this->fetchDataFromApi($urlBase . '/training-centers');

        return view('courses.show', compact('course', 'areas', 'trainingCenters'));
    }

    public function edit($id)
    {
        $urlBase = env('URL_SERVER_API', 'http://127.0.0.1:8000/api');
        $course = $this->fetchDataFromApi($this->url . '/' . $id);
        $areas = $this->fetchDataFromApi($urlBase . '/areas');
        $trainingCenters = $this->fetchDataFromApi($urlBase . '/training-centers');

        return view('courses.edit', compact('course', 'areas', 'trainingCenters'));
    }

    public function update(Request $request, $id)
    {
        try {
            $name = $request->course_name ?? $request->course_number;
            $response = Http::put($this->url . '/' . $id, [
                'course_name' => $name,
                'course_number' => $name,
                'day' => $request->day,
                'area_id' => $request->area_id,
                'training_center_id' => $request->training_center_id,
            ]);

            if ($response->successful()) {
                return redirect()->route('courses.index')->with('success', 'Curso actualizado con éxito');
            }

            return redirect()->back()->with('error', 'Error al actualizar el curso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo conectar con el servidor backend.');
        }
    }
}