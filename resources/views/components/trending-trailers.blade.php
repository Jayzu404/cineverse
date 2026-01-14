<section class="relative px-5 py-12 trending-trailers bg-cover bg-center bg-no-repeat transition-all duration-300">
  {{-- <div class="absolute inset-0 z-9 bg-zinc-900"></div> --}}
  <h2 class="text-xl mb-5 relative z-10">Trending Trailers</h2>
  <div class="relative z-10 flex gap-4 overflow-x-auto scrollbar-hide" id="trending-trailers-container">
    {{-- Trending trailers dynamically loaded here --}}

     <!-- Loading Skeleton -->
    <div class="flex gap-4 animate-pulse" id="trailer-skeleton-cards">
      <!-- Skeleton Card 1 -->
      <div class="flex-shrink-0 w-[300px]">
        <div class="bg-gray-700 rounded-lg h-[180px] mb-3"></div>
      </div>

      <!-- Skeleton Card 2 -->
      <div class="flex-shrink-0 w-[300px]">
        <div class="bg-gray-700 rounded-lg h-[180px] mb-3"></div>
      </div>

      <!-- Skeleton Card 3 -->
      <div class="flex-shrink-0 w-[300px]">
        <div class="bg-gray-700 rounded-lg h-[180px] mb-3"></div>
      </div>

      <!-- Skeleton Card 4 -->
      <div class="flex-shrink-0 w-[300px]">
        <div class="bg-gray-700 rounded-lg h-[180px] mb-3"></div>
      </div>

      <!-- Skeleton Card 5 -->
      <div class="flex-shrink-0 w-[300px]">
        <div class="bg-gray-700 rounded-lg h-[180px] mb-3"></div>
      </div>
    </div>  
  </div>
</section>