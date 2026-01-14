{{-- <section class="flex space-x-6 overflow-x-auto scrollbar-hide trending-movies p-5"> --}}
<section class="bg-red-950 p-5 trending-movies">
  <div class="px-5 flex justify-between">
    <h2 class="text-xl mb-5">Trending Movies</h2>
    <h2 class="cursor-pointer">view all &rarr;</h2>
  </div>
  <div class="flex gap-4 overflow-x-auto scrollbar-hide movie-card-container">
    {{-- trending movies cards dynamically loaded here --}}

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
</section>  