@extends('layouts.app')

<div class="min-h-screen bg-neutral-950 text-white flex items-center justify-center py-8">
    <div class="py-10 max-w-6xl w-full">
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <!-- Left side - Movie poster -->
            <div class="relative group max-w-md mx-auto md:mx-0">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-600/20 to-red-900/20 blur-3xl group-hover:blur-2xl transition-all duration-500"></div>
                <div class="relative aspect-[2/3] bg-gradient-to-br from-neutral-900 via-neutral-800 to-neutral-900 rounded-sm overflow-hidden shadow-2xl">
                    <img 
                        src="{{$imageBaseUrl . '/' . $movieData['poster_path']}}"
                        alt="{{ $movieData['title'] }}"
                        class="w-full h-full object-cover opacity-90"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                </div>
            </div>

            <!-- Right side - Movie info -->
            <div class="space-y-5">
                <!-- Title -->
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-2 tracking-tight">
                      {{ $movieData['title'] }}
                    </h1>
                    <div class="flex items-center gap-3 text-neutral-400 text-xs">
                        <span class="px-2 py-0.5 border border-neutral-700 rounded text-xs">{{ $contentRate }}</span>
                        <span>{{ $releaseYear }}</span>
                        <span>•</span>
                        <span>{{ $runtime }}</span>
                    </div>
                </div>

                <!-- Rating -->
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2">
                        <div class="relative w-12 h-12">
                            <svg class="w-12 h-12 transform -rotate-90">
                                <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="3" fill="none" class="text-neutral-800" />
                                <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="3" fill="none" class="text-green-500" 
                                    stroke-dasharray="125.66" stroke-dashoffset="31.42" stroke-linecap="round" />
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-sm font-bold">78%</span>
                            </div>
                        </div>
                        <div class="text-xs text-neutral-400">User Score</div>
                    </div>
                </div>

                <!-- Tagline -->
                <div class="border-l-2 border-orange-600 pl-3">
                    <p class="text-base italic text-neutral-300">{{ $movieData['tagline'] }}</p>
                </div>

                <!-- Overview -->
                <div>
                    <h2 class="text-base font-semibold mb-2">Overview</h2>
                    <p class="text-neutral-300 leading-relaxed text-sm">
                      {{ $movieData['overview'] }}
                    </p>  
                </div>

                <!-- Genres -->
                <div class="flex flex-wrap gap-2">
                  @if(isset($movieData['genres']) && !empty($movieData['genres']))
                    @foreach($movieData['genres'] as $genre)
                        <span class="px-3 py-1 bg-neutral-900 rounded-full text-xs border border-neutral-800">{{ $genre['name'] }}</span>
                      @endforeach
                  @endif
                </div>

                <!-- Crew -->
                <div class="grid grid-cols-2 gap-4 pt-3 border-t border-neutral-800">
                    <div>
                      <div class="text-xs text-neutral-400 mb-1">Director</div>
                        @if(isset($movieCredits['crew']) && !empty($movieCredist['crew']))
                          @foreach($movieCredits['crew'] as $crew)
                            @if($crew['job'] === 'Director')
                              <div class="font-semibold text-sm">{{ $crew['name'] }}</div>
                            @endif
                          @endforeach
                        @endif
                    </div>
                    <div>
                        <div class="text-xs text-neutral-400 mb-1">Screenplay</div>
                          @if(isset($movieCredits['crew']) && !empty($movieCredits['crew']))
                            @foreach($movieCredits['crew'] as $crew)
                              @if($crew['job'] === 'Screenplay')
                                <div class="font-semibold text-sm">{{ $crew['name'] }}</div>
                              @endif
                            @endforeach
                          @endif
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3 pt-3">
                    <button class="flex-1 bg-orange-600 hover:bg-orange-700 text-white font-semibold py-2 px-4 rounded transition-colors text-sm">
                        Play Trailer
                    </button>
                    <button class="px-4 py-2 border border-neutral-700 hover:border-neutral-600 rounded transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>
                    <button class="px-4 py-2 border border-neutral-700 hover:border-neutral-600 rounded transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-white p-6">
    <h3 class="text-xl font-semibold text-black ml-1 leading-none">Casts</h3>

    <div class="casts-list flex gap-5 overflow-x-scroll scrollbar-hide flex-1 px-1 py-2">
        @foreach($movieCredits['cast'] as $cast)
            <div class="card shrink-0 w-[160px] rounded-xl overflow-hidden shadow-md">
                <img src="https://image.tmdb.org/t/p/w500/{{ $cast['profile_path'] }}" alt="{{ $cast['name'] }}" loading="lazy" class="h-auto w-full object-contain">        

                <div class="actor-character p-3 bg-white">
                    <p class="actor font-semibold text-neutral-900">{{ $cast['name'] }}</p>
                    <p class="character text-xs text-neutral-600">{{ $cast['character'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>