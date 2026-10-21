<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    // Servidor adminSena API
    protected $url = 'http://127.0.0.1:8000/api/areas';

    // Listar todas las áreas
    public function index()
    {
        try {
            $response = Http::get($this->url);
            $areas = $response->json() ?? [];
        } catch (\Exception $e) {
            $areas = [];
        }

        return view('areas.index', compact('areas'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('areas.create');
    }

    // POST: Enviar datos para crear en adminSena
    public function store(Request $request)
    {
        try {
            $response = Http::post($this->url, [
                'name' => $request->name,
            ]);

            if ($response->successful()) {
                return redirect()->route('areas.index')->with('success', 'Área creada con éxito en el servidor');
            }

            return redirect()->route('areas.create')->with('error', 'Error al guardar en el servidor backend.');
        } catch (\Exception $e) {
            return redirect()->route('areas.create')->with('error', 'No se pudo conectar con el servidor backend. Verifica que MySQL y adminSena estén encendidos.');
        }
    }

    // Ver detalles de un área
    public function show($id)
    {
        try {
            $response = Http::get("{$this->url}/{$id}");
            $area = $response->json();
        } catch (\Exception $e) {
            $area = null;
        }

        return view('areas.show', compact('area'));
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        try {
            $response = Http::get("{$this->url}/{$id}");
            $area = $response->json();
        } catch (\Exception $e) {
            $area = null;
        }

        return view('areas.edit', compact('area'));
    }

    // UPDATE: Enviar cambios modificados a adminSena
    public function update(Request $request, $id)
    {
        try {
            $response = Http::put("{$this->url}/{$id}", [
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