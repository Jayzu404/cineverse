@extends('layouts.app')

@section('content')
  <x-hero />
  <x-trending-movies />
  <x-top-rated-movies />
  <x-trending-trailers />

  @push('script')
    @vite('resources/js/pages/home.js')
  @endpush
@endsection