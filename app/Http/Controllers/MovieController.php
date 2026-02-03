<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\TmdbService;

class MovieController extends Controller
{
    public function __construct(private TmdbService $tmdb){}

    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $category = $request->query('category', 'popular');
        

        $response = $this->tmdb->movie($category, ['page' => $page]);

        $data = $response->json();

        if ($category === 'latest') {
            return response()->json([
                'results' => $data ? [$data] : [],
                'page' => 1,
                'total_pages' => 1,
                'total_results' => $data ? 1 : 0
            ]);
        }

        return $response->json();
    }

    public function getMovieTrailer($movieId) 
    {
        return $this->tmdb->movieTrailer($movieId)->json();
    }

    public function show(int $id, string $slugTitle)
    {
        $imageBaseUrl = $this->tmdb->image_base_url;

        $movieDetails = $this->tmdb->movieDetails($id)->json();
        $releaseDate = $this->tmdb->releaseDate($id)->json();
        $credits = $this->tmdb->movieCredit($id)->json();

        $contentRate = $this->resolveContentRating($releaseDate);
        $releaseYear = $this->resolveReleaseYear($movieDetails);
        $runtime = $this->resolveRuntime($movieDetails);

        $movieCasts = $this->getMovieCastsData($credits);

        return view('pages.movies.detail.movie-detail', 
                    compact(
                        'id',
                        'slugTitle',
                        'movieDetails', 
                        'credits', 
                        'contentRate', 
                        'imageBaseUrl', 
                        'releaseYear', 
                        'runtime'));
    }

    private function resolveContentRating(array $releaseDate): string
    {
        if (empty($releaseDate['results'])) {
            return 'Not Rated';
        }

        $fallback = null;

        // Priority 1: US theatrical release (type 3)
        foreach ($releaseDate['results'] as $data) {
            if ($data['iso_3166_1'] === 'US') {
                foreach ($data['release_dates'] as $release) {
                    if (!empty($release['certification'])) {
                        if ($release['type'] === 3) {
                            return $release['certification'];
                        }
                        // $fallback = $release['certification']; if i want the last
                        $fallback ??= $release['certification']; // preserve the first value only
                    }
                }
            }
        }
            
        // Priority 2: Any country's theatrical release (type 3)
        foreach ($releaseDate['results'] as $data) {
            foreach ($data['release_dates'] as $release) {
                if (!empty($release['certification'])) {
                    if ($release['type'] === 3) {
                        return $release['certification'];
                    }
                    $fallback ??= $release['certification'];
                }
            }
        }

        return $fallback ?? 'Not Rated';
    }

    private function resolveRuntime(array $movieDetails): string
    {
        $movieRuntimeInMin = $movieDetails['runtime'];

        if (empty($movieRuntimeInMin)) {
            return 'N/A';
        }

        $hours   = floor($movieRuntimeInMin / 60);
        $minutes = $movieRuntimeInMin % 60;

        $formatted = "{$hours}h {$minutes}m";

        return $formatted;
    }

    private function resolveReleaseYear(array $movieDetails):int
    {
        $releaseDate = $movieDetails['release_date'];

        $year = Carbon::parse($releaseDate)->year;

        return $year;
    }

    private function getMovieCastsData(array $movieCredits):array
    {
        return $movieCredits['cast'];
    }
}