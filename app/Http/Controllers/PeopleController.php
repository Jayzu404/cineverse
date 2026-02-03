<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TmdbService;

class PeopleController extends Controller
{

    public function __construct(private TmdbService $tmdb){}

    public function index(Request $request)
    {
        $page = $request->query('page');
        $category = $request->query('category');
        
        $response = $this->tmdb->people($category, ['page' => $page]);

        return $response->json();
    }
}
