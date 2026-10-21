<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json() ?? [];
    }

    public function index()   //http://api.bloger.test/v1/courses
    {

        $url = env('URL_SERVER_API');

        $courses = $this->fetchDataFromApi($url . '/courses');

        $areas = $this->fetchDataFromApi($url . '/areas');
        $trainingCenters = $this->fetchDataFromApi($url . '/training-centers');

        return view('courses.index', compact('courses', 'areas', 'trainingCenters'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');

        $course = $this->fetchDataFromApi($url . '/courses/' . $id);

        $areas = $this->fetchDataFromApi($url . '/areas');
        $trainingCenters = $this->fetchDataFromApi($url . '/training-centers');

        return view('courses.show', compact('course', 'areas', 'trainingCenters'));
    }
}
