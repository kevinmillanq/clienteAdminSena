<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json() ?? [];
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $areas = $this->fetchDataFromApi($url . '/areas');
        $teachers = $this->fetchDataFromApi($url . '/teachers');
        $courses = $this->fetchDataFromApi($url . '/courses');
        $apprentices = $this->fetchDataFromApi($url . '/apprentices');

        return view('home', compact('areas', 'teachers', 'courses', 'apprentices'));
    }
}
