<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    protected $url;

    public function __construct()
    {
        $this->url = env('URL_SERVER_API', 'http://127.0.0.1:8000/api') . '/computers';
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
        $computers = $this->fetchDataFromApi($this->url);
        return view('computers.index', compact('computers'));
    }

    public function create()
    {
        return view('computers.create');
    }

    public function store(Request $request)
    {
        try {
            $response = Http::post($this->url, [
                'number' => $request->number,
                'brand' => $request->brand,
            ]);

            if ($response->successful()) {
                return redirect()->route('computers.index')->with('success', 'Equipo creado con éxito');
            }

            return redirect()->back()->with('error', 'Error al guardar el equipo en el servidor.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo conectar con el servidor backend.');
        }
    }

    public function show($id)
    {
        $computer = $this->fetchDataFromApi($this->url . '/' . $id);
        return view('computers.show', compact('computer'));
    }

    public function edit($id)
    {
        $computer = $this->fetchDataFromApi($this->url . '/' . $id);
        return view('computers.edit', compact('computer'));
    }

    public function update(Request $request, $id)
    {
        try {
            $response = Http::put($this->url . '/' . $id, [
                'number' => $request->number,
                'brand' => $request->brand,
            ]);

            if ($response->successful()) {
                return redirect()->route('computers.index')->with('success', 'Equipo actualizado con éxito');
            }

            return redirect()->back()->with('error', 'Error al actualizar el equipo.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'No se pudo conectar con el servidor backend.');
        }
    }
}