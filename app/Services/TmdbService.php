<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TmdbService
{
    private string $api_key;
    private string $base_url;
    public string $image_base_url;

    public function __construct()
    {
        $this->api_key = config('services.tmdb.api_key');
        $this->base_url = config('services.tmdb.base_url');
        $this->image_base_url = config('services.tmdb.image_base_url');
    }

    private function client()
    {
        return Http::timeout(5)->retry(2, 200);
    }

    private function get($endpoint, array $params = [])
    {
        return $this->client()->get("{$this->base_url}{$endpoint}", array_merge($params, ['api_key' => $this->api_key]));
    }

    //========== PUBLIC MOVIE API ============//

    public function movie(string $category, array $params = [])
    {
        return $this->get("/movie/{$category}", $params)->throw();
    }

    public function movieTrailer(int $movieId)
    {
        return $this->get("/movie/{$movieId}/videos", [])->throw();
    }

    public function movieCredit($movieId)
    {
        return $this->get("/movie/{$movieId}/credits", [])->throw();
    }

    public function releaseDate($movieId)
    {
        return $this->get("/movie/{$movieId}/release_dates", [])->throw();
    }

    public function movieDetails($movieId)
    {
        return $this->get("/movie/{$movieId}", [])->throw();
    }

    // ========== PUBLIC TV SHOW API ============ //

    public function tv(string $category, array $params = [])
    {
        return $this->get("/tv/{$category}", $params)->throw();
    }
}
