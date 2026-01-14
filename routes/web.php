<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\TvShowController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/movies/popular', function () {
    return view('pages.movies.popular');
})->name('movies.popular');

Route::get('/api/movies', [MovieController::class, 'index'])->name('api.movies.popular');

Route::get('/movies/now-playing', function () {
    return view('pages.movies.now-playing');
})->name('movies.now-playing');

Route::get('/movies/upcoming', function () {
    return view('pages.movies.upcoming');
})->name('movies.upcoming');

Route::get('/movies/top-rated', function () {
    return view('pages.movies.top-rated');
})->name('movies.top-rated');

Route::get('/api/movie/{movieId}', [MovieController::class, "movieTrailer"]);


Route::get('/tv/popular', function () {
    return view('pages.tv_shows.popular');
})->name('tv.popular');

Route::get('/tv/airing-today', function () {
    return view('pages.tv_shows.airing-today');
})->name('tv.airing');

Route::get('/tv/on-tv', function () {
    return view('pages.tv_shows.on-tv');
})->name('tv.on-tv');

Route::get('/tv/top-rated', function () {
    return view('pages.tv_shows.top-rated');
})->name('tv.top-rated');

Route::get('/api/tv-show', [TvShowController::class, 'index'])->name('api.tv-show');