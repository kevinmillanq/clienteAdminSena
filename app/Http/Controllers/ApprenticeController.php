<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{

    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json() ?? [];
    }

    public function index()   //http://api.bloger.test/v1/apprentices
    {

        $url = env('URL_SERVER_API');

        $apprentices = $this->fetchDataFromApi($url . '/apprentices');

        $courses = $this->fetchDataFromApi($url . '/courses');
        $computers = $this->fetchDataFromApi($url . '/computers');

        return view('apprentices.index', compact('apprentices', 'courses', 'computers'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $apprentice = $this->fetchDataFromApi($url . '/apprentices/' . $id);

        $courses = $this->fetchDataFromApi($url . '/courses');
        $computers = $this->fetchDataFromApi($url . '/computers');

        return view('apprentices.show', compact('apprentice', 'courses', 'computers'));
    }
}
