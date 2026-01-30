<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class TmdbService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    private static function client()
    {
        return Http::timeout(5)->retry(2, 200);
    }

    public function get(string $url, array $params = [])
    {
        return $this->client()->get($url, $params);
    }
}
