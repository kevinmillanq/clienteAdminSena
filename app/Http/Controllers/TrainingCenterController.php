<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    protected $url;

    public function __construct()
    {
        $this->url = env('URL_SERVER_API', 'http://127.0.0.1:8000/api') . '/training-centers';
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
        $trainingCenters = $this->fetchDataFromApi($this->url);
        return view('training-centers.index', compact('trainingCenters'));
    }

    public function create()
    {
        return view('training-centers.create');
    }

    public function store(Request $request)
    {
        try {
            $response = Http::post($this->url, [
                'name' => $request->name,
                'location' => $request->location,
            ]);

            if ($response->successful()) {
                return redirect()->route('training-centers.index')->with('success', 'Centro de formación creado con éxito');
            }

            return redirect()->back()->with('error', 'Error al guardar el centro en el servidor.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo conectar con el servidor backend.');
        }
    }

    public function show($id)
    {
        $trainingCenter = $this->fetchDataFromApi($this->url . '/' . $id);
        return view('training-centers.show', compact('trainingCenter'));
    }

    public function edit($id)
    {
        $trainingCenter = $this->fetchDataFromApi($this->url . '/' . $id);
        return view('training-centers.edit', compact('trainingCenter'));
    }

    public function update(Request $request, $id)
    {
        try {
            $response = Http::put($this->url . '/' . $id, [
                'name' => $request->name,
                'location' => $request->location,
            ]);

            if ($response->successful()) {
                return redirect()->route('training-centers.index')->with('success', 'Centro de formación actualizado con éxito');
            }

            return redirect()->back()->with('error', 'Error al actualizar el centro.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo conectar con el servidor backend.');
        }
    }
}