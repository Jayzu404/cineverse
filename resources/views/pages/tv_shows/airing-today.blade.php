@extends('layouts.app')

@section('title', 'Cineverse | Tv Shows - Airing Today')

@section('content')
  <div class="grid grid-cols-[auto_1fr] py-16 min-h-full">
    <div class="filter-wrapper">
      <x-filter />
    </div>

    <div id="list-section">
      <x-spinner />
      <x-tv-show-list />
      <x-pagination />
    </div>
  </div>
@endsection

@push('script')
  @vite('resources/js/pages/tv_series/airingToday.js')
@endpush