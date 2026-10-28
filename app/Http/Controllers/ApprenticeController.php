<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    protected $url;

    public function __construct()
    {
        $this->url = env('URL_SERVER_API', 'http://127.0.0.1:8000/api') . '/apprentices';
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
        $apprentices = $this->fetchDataFromApi($this->url);
        $courses = $this->fetchDataFromApi($urlBase . '/courses');
        $computers = $this->fetchDataFromApi($urlBase . '/computers');

        return view('apprentices.index', compact('apprentices', 'courses', 'computers'));
    }

    public function create()
    {
        $urlBase = env('URL_SERVER_API', 'http://127.0.0.1:8000/api');
        $courses = $this->fetchDataFromApi($urlBase . '/courses');
        $computers = $this->fetchDataFromApi($urlBase . '/computers');

        return view('apprentices.create', compact('courses', 'computers'));
    }

    public function store(Request $request)
    {
        try {
            $response = Http::post($this->url, [
                'name' => $request->name,
                'email' => $request->email,
                'cell_number' => $request->cell_number,
                'course_id' => $request->course_id,
                'computer_id' => $request->computer_id,
            ]);

            if ($response->successful()) {
                return redirect()->route('apprentices.index')->with('success', 'Aprendiz creado con éxito');
            }

            return redirect()->back()->with('error', 'Error al guardar el aprendiz en el servidor.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo conectar con el servidor backend.');
        }
    }

    public function show($id)
    {
        $urlBase = env('URL_SERVER_API', 'http://127.0.0.1:8000/api');
        $apprentice = $this->fetchDataFromApi($this->url . '/' . $id);
        $courses = $this->fetchDataFromApi($urlBase . '/courses');
        $computers = $this->fetchDataFromApi($urlBase . '/computers');

        return view('apprentices.show', compact('apprentice', 'courses', 'computers'));
    }

    public function edit($id)
    {
        $urlBase = env('URL_SERVER_API', 'http://127.0.0.1:8000/api');
        $apprentice = $this->fetchDataFromApi($this->url . '/' . $id);
        $courses = $this->fetchDataFromApi($urlBase . '/courses');
        $computers = $this->fetchDataFromApi($urlBase . '/computers');

        return view('apprentices.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, $id)
    {
        try {
            $response = Http::put($this->url . '/' . $id, [
                'name' => $request->name,
                'email' => $request->email,
                'cell_number' => $request->cell_number,
                'course_id' => $request->course_id,
                'computer_id' => $request->computer_id,
            ]);

            if ($response->successful()) {
                return redirect()->route('apprentices.index')->with('success', 'Aprendiz actualizado con éxito');
            }

            return redirect()->back()->with('error', 'Error al actualizar el aprendiz.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo conectar con el servidor backend.');
        }
    }
}