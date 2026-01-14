<section class="bg-red-950 relative p-5 top-rated-movies"> {{-- style="background-image: url('{{ asset('images/cineverse-home-bg.jpg') }}')" --}}
  {{-- <div class="absolute inset-0 bg-black/50 backdrop-blur-xs"></div> --}}
  <div class="relative z-10">
    <div class="px-5 flex justify-between">
      <h2 class="text-xl mb-5">Top Rated Movies</h2>
      <h2 class="cursor-pointer">view all &rarr;</h2>
    </div>
    <div class="flex gap-4 card-container overflow-x-auto scrollbar-hide">
      {{-- Top rated movies dynamically loaded here --}}

      <!-- Loading Skeleton -->
      <div class="flex gap-4 animate-pulse skeleton-cards">
        <!-- Skeleton Card 1 -->
        <div class="flex-shrink-0 w-[200px]">
          <div class="bg-gray-700 rounded-lg h-[300px] mb-3"></div>
          <div class="bg-gray-700 rounded h-4 w-3/4 mb-2"></div>
          <div class="bg-gray-700 rounded h-3 w-1/2"></div>
          <div class="bg-gray-700 rounded h-4 w-3/4 mt-2"></div>
        </div>
        
        <!-- Skeleton Card 2 -->
        <div class="flex-shrink-0 w-[200px]">
          <div class="bg-gray-700 rounded-lg h-[300px] mb-3"></div>
          <div class="bg-gray-700 rounded h-4 w-3/4 mb-2"></div>
          <div class="bg-gray-700 rounded h-3 w-1/2"></div>
          <div class="bg-gray-700 rounded h-4 w-3/4 mt-2"></div>
        </div>
        
        <!-- Skeleton Card 3 -->
        <div class="flex-shrink-0 w-[200px]">
          <div class="bg-gray-700 rounded-lg h-[300px] mb-3"></div>
          <div class="bg-gray-700 rounded h-4 w-3/4 mb-2"></div>
          <div class="bg-gray-700 rounded h-3 w-1/2"></div>
          <div class="bg-gray-700 rounded h-4 w-3/4 mt-2"></div>
        </div>
        
        <!-- Skeleton Card 4 -->
        <div class="flex-shrink-0 w-[200px]">
          <div class="bg-gray-700 rounded-lg h-[300px] mb-3"></div>
          <div class="bg-gray-700 rounded h-4 w-3/4 mb-2"></div>
          <div class="bg-gray-700 rounded h-3 w-1/2"></div>
          <div class="bg-gray-700 rounded h-4 w-3/4 mt-2"></div>
        </div>
        
        <!-- Skeleton Card 5 -->
        <div class="flex-shrink-0 w-[200px]">
          <div class="bg-gray-700 rounded-lg h-[300px] mb-3"></div>
          <div class="bg-gray-700 rounded h-4 w-3/4 mb-2"></div>
          <div class="bg-gray-700 rounded h-3 w-1/2"></div>
          <div class="bg-gray-700 rounded h-4 w-3/4 mt-2"></div>
        </div>

              <!-- Skeleton Card 6 -->
        <div class="flex-shrink-0 w-[200px]">
          <div class="bg-gray-700 rounded-lg h-[300px] mb-3"></div>
          <div class="bg-gray-700 rounded h-4 w-3/4 mb-2"></div>
          <div class="bg-gray-700 rounded h-3 w-1/2"></div>
          <div class="bg-gray-700 rounded h-4 w-3/4 mt-2"></div>
        </div>

              <!-- Skeleton Card 7 -->
        <div class="flex-shrink-0 w-[200px]">
          <div class="bg-gray-700 rounded-lg h-[300px] mb-3"></div>
          <div class="bg-gray-700 rounded h-4 w-3/4 mb-2"></div>
          <div class="bg-gray-700 rounded h-3 w-1/2"></div>
          <div class="bg-gray-700 rounded h-4 w-3/4 mt-2"></div>
        </div>
      </div>
    </div>
  </div>
</section>