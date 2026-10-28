<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $url;

    public function __construct()
    {
        $this->url = env('URL_SERVER_API', 'http://127.0.0.1:8000/api') . '/teachers';
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
        $teachers = $this->fetchDataFromApi($this->url);
        $areas = $this->fetchDataFromApi($urlBase . '/areas');
        $trainingCenters = $this->fetchDataFromApi($urlBase . '/training-centers');

        return view('teachers.index', compact('teachers', 'areas', 'trainingCenters'));
    }

    public function create()
    {
        $urlBase = env('URL_SERVER_API', 'http://127.0.0.1:8000/api');
        $areas = $this->fetchDataFromApi($urlBase . '/areas');
        $trainingCenters = $this->fetchDataFromApi($urlBase . '/training-centers');

        return view('teachers.create', compact('areas', 'trainingCenters'));
    }

    public function store(Request $request)
    {
        try {
            $response = Http::post($this->url, [
                'name' => $request->name,
                'email' => $request->email,
                'area_id' => $request->area_id,
                'training_center_id' => $request->training_center_id,
            ]);

            if ($response->successful()) {
                return redirect()->route('teachers.index')->with('success', 'Docente creado con éxito');
            }

            return redirect()->back()->with('error', 'Error al guardar el docente en el servidor.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo conectar con el servidor backend.');
        }
    }

    public function show($id)
    {
        $urlBase = env('URL_SERVER_API', 'http://127.0.0.1:8000/api');
        $teacher = $this->fetchDataFromApi($this->url . '/' . $id);
        $areas = $this->fetchDataFromApi($urlBase . '/areas');
        $trainingCenters = $this->fetchDataFromApi($urlBase . '/training-centers');

        return view('teachers.show', compact('teacher', 'areas', 'trainingCenters'));
    }

    public function edit($id)
    {
        $urlBase = env('URL_SERVER_API', 'http://127.0.0.1:8000/api');
        $teacher = $this->fetchDataFromApi($this->url . '/' . $id);
        $areas = $this->fetchDataFromApi($urlBase . '/areas');
        $trainingCenters = $this->fetchDataFromApi($urlBase . '/training-centers');

        return view('teachers.edit', compact('teacher', 'areas', 'trainingCenters'));
    }

    public function update(Request $request, $id)
    {
        try {
            $response = Http::put($this->url . '/' . $id, [
                'name' => $request->name,
                'email' => $request->email,
                'area_id' => $request->area_id,
                'training_center_id' => $request->training_center_id,
            ]);

            if ($response->successful()) {
                return redirect()->route('teachers.index')->with('success', 'Docente actualizado con éxito');
            }

            return redirect()->back()->with('error', 'Error al actualizar el docente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo conectar con el servidor backend.');
        }
    }
}