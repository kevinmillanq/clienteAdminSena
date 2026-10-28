<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    protected $url;

    public function __construct()
    {
        $this->url = env('URL_SERVER_API', 'http://127.0.0.1:8000/api') . '/areas';
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
        $areas = $this->fetchDataFromApi($this->url);
        return view('areas.index', compact('areas'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        try {
            $response = Http::post($this->url, [
                'name' => $request->name,
            ]);

            if ($response->successful()) {
                return redirect()->route('areas.index')->with('success', 'Área creada con éxito');
            }

            return redirect()->back()->with('error', 'Error al guardar el área en el servidor.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo conectar con el servidor backend.');
        }
    }

    public function show($id)
    {
        $area = $this->fetchDataFromApi($this->url . '/' . $id);
        return view('areas.show', compact('area'));
    }

    public function edit($id)
    {
        $area = $this->fetchDataFromApi($this->url . '/' . $id);
        return view('areas.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        try {
            $response = Http::put($this->url . '/' . $id, [
                'name' => $request->name,
            ]);

            if ($response->successful()) {
                return redirect()->route('areas.index')->with('success', 'Área actualizada con éxito');
            }

            return redirect()->back()->with('error', 'Error al actualizar el área.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo conectar con el servidor backend.');
        }
    }
}