<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Service\TmdbService;

class MovieController extends Controller
{
    private const BASE_URL = 'https://api.themoviedb.org/3/movie';
    private const IMAGE_BASE_URL = 'https://image.tmdb.org/t/p/w500';

    public function __construct(private TmdbService $tmdb){}

    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $category = $request->query('category', 'popular');
        

        $response = $this->tmdb->get(self::BASE_URL . "/{$category}", [
            'api_key' => env('TMDB_API_KEY'),
            'page' => $page
        ]);

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

    public function movieTrailer($movieId) 
    {
        $response = $this->tmdb->get(self::BASE_URL . "/{$movieId}/videos", ['api_key' => env('TMDB_API_KEY')]);

        return $response->json();
    }

    public function show(int $id, string $slugTitle)
    {
        $imageBaseUrl = self::IMAGE_BASE_URL;

        $movieData = $this->getMovieDataById($id);

        $movieCredits = $this->getMovieCredit($id);

        // release date data
        $contentRate = $this->getContentRating($id);
        $releaseYear = $this->getMovieReleaseYear($movieData);
        $runtime = $this->getMovieRuntime($movieData);

        $movieCasts = $this->getMovieCastsData($movieCredits);

        return view('pages.movies.detail.movie-detail', compact('id', 'slugTitle', 'movieData', 'movieCredits', 'contentRate', 'imageBaseUrl', 'releaseYear', 'runtime'));
    }

    private function getMovieDataById(int $id): array
    {
        $response = $this->tmdb->get(self::BASE_URL . "/{$id}", ['api_key' => env('TMDB_API_KEY')]);

        return $response->json();
    }

    public function getMovieCredit(int $id)
    {
        $response = $this->tmdb->get(self::BASE_URL . "/{$id}/credits", ['api_key' => env('TMDB_API_KEY')]);

        return $response->json();
    }

    private function getContentRating(int $id): string
    {
        $response = $this->tmdb->get(self::BASE_URL . "/{$id}/release_dates", ['api_key' => env('TMDB_API_KEY')]);
        $releaseDateData = $response->json();

        if (empty($releaseDateData['results'])) {
            return 'Not Rated';
        }

        $fallback = null;

        // Priority 1: US theatrical release (type 3)
        foreach ($releaseDateData['results'] as $data) {
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
        foreach ($releaseDateData['results'] as $data) {
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

    private function getMovieRuntime(array $movieData): string
    {
        $movieRuntimeInMin = $movieData['runtime'];

        $hours   = floor($movieRuntimeInMin / 60);
        $minutes = $movieRuntimeInMin % 60;

        $formatted = "{$hours}h {$minutes}m";

        return $formatted;
    }

    private function getMovieReleaseYear(array $movieData):int
    {
        $releaseDate = $movieData['release_date'];

        $year = Carbon::parse($releaseDate)->year;

        return $year;
    }

    private function getMovieCastsData(array $movieCredits):array
    {
        return $movieCredits['cast'];
    }
}