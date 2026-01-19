@extends('layouts.app')

@section('title', 'Cineverse | People - Popular')

@section('content')
  <div class="grid grid-cols-[1fr] py-16 min-h-full">
    <div id="list-section">
      <x-spinner />
      <x-people-list />
      <x-pagination />
    </div>
  </div>
@endsection

@push('script')
  @vite('resources/js/pages/people/popular')
@endpush