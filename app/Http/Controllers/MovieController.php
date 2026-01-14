<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    private $BASE_URL = 'https://api.themoviedb.org/3/movie';
    // private $API_KEY = env('TMDB_API_KEY');

    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $category = $request->query('category', 'popular');

        $response = Http::get("{$this->BASE_URL}/{$category}", [
            'api_key' => env('TMDB_API_KEY'),
            'page' => $page
        ]);

        // $data = $response->json();

        // if ($category === 'latest') {
        //     return response()->json([
        //         'results' => $data ? [$data] : [],
        //         'page' => 1,
        //         'total_pages' => 1,
        //         'total_results' => $data ? 1 : 0
        //     ]);
        // }

        return $response->json();
    }

    public function movieTrailer($movieId) 
    {
        $response = Http::get("$this->BASE_URL/{$movieId}/videos", ['api_key' => env('TMDB_API_KEY')]);

        return $response->json();

        // $data = $response->json();
        // $trailer = collect($data['results'])->firstWhere(function ($video) {
        //     return $video['type'] === 'Trailer' && $video['site'] === 'YouTube';
        // });
    
        // if ($trailer) {
        //     return response()->json([
        //         'url' => "https://www.youtube.com/embed/{$trailer['key']}"
        //     ]);
        // }
    
        // return response()->json(['url' => null], 404);
    }
}
