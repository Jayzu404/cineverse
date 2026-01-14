<section class="relative mt-15 hero h-[90dvh] bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/cineverse-home-bg.jpg') }}')">
  <div class="absolute inset-0 bg-black/50 backdrop-blur-xs"></div>
  <div class="relative z-10 flex flex-col justify-center items-center h-full px-10">
    <h1 class="text-7xl mb-2">Cineverse</h1>
    <p class="text-gray-300">Discover movies, TV shows, and trending titles — all in one place.</p>
    <p class="text-gray-300">Search, explore, and dive into detailed information powered by TMDB.</p>
    <div class="relative search-container w-150">
      <input class="mt-3 bg-white text-sm text-gray-800 px-5 w-full h-11 border border-zinc-800 rounded-xl" type="text" name="search" id="search" placeholder="Search">
      <img class="absolute bottom-3 right-6" src="{{ asset('/images/search.png') }}" alt="search icon" width="22px">
    </div>
  </div>
</section>