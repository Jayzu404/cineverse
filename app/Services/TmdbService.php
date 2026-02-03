<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TmdbService
{

    private function client()
    {
        return Http::timeout(5)->retry(2, 200);
    }

    public function get(string $url, array $params = [])
    {
        return $this->client()->get($url, $params);
    }
}
