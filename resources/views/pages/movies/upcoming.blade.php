@extends('layouts.app')

@section('title', 'Cineverse | Movies - Upcoming')

@section('content')
  <div class="grid grid-cols-[auto_1fr] py-16 min-h-full">
    <div class="filter-wrapper">
      <x-filter />
    </div>

    <div id="list-section">
      <x-spinner />
      <x-movie-list />
      <x-pagination />
    </div>
  </div>
@endsection

@push('script')
  @vite('resources/js/pages/movie/upcoming.js')
@endpush