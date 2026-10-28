<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000/api');

        $areas = $this->fetchDataFromApi($url . '/areas');
        $trainingCenters = $this->fetchDataFromApi($url . '/training-centers');
        $teachers = $this->fetchDataFromApi($url . '/teachers');
        $courses = $this->fetchDataFromApi($url . '/courses');
        $computers = $this->fetchDataFromApi($url . '/computers');
        $apprentices = $this->fetchDataFromApi($url . '/apprentices');

        return view('home', compact('areas', 'trainingCenters', 'teachers', 'courses', 'computers', 'apprentices'));
    }
}