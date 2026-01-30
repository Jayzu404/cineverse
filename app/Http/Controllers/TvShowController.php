<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvShowController extends Controller
{
    private $BASE_URL = 'https://api.themoviedb.org/3/tv';

    private function tmdb()
    {
        return Http::timeout(5)->retry(2, 200);
    }

    public function index(Request $request) 
    {
        $page = $request->query('page');
        $category = $request->query('category');

        $response = $this->tmdb()->get("{$this->BASE_URL}/{$category}", [
            'api_key'  => env('TMDB_API_KEY'),
            'page'     => $page,
        ]);

        return $response->json();
    }
}