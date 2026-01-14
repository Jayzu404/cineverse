<nav class="fixed z-[9998] top-0 left-0 w-screen py-5 max-[620px]:px-10 px-30 bg-red-900 flex justify-between">
  <h1 class="font-bold"><a href="/">CINEVERSE</a></h1>

  <ul class="flex max-[620px]:justify-between justify-around space-x-10">
    <li class="max-[1040px]:hidden"><a href="/">Home</a></li>
    <li class="relative max-[1040px]:hidden dropdown group cursor-pointer">
      Movies
      <span><i class="fa-solid fa-chevron-down"></i></span>

      <ul class="dropdown-menu flex flex-col gap-2 absolute bg-red-900 p-3 w-40 top-full left-[-13px] rounded-sm opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
        <li class="hover:bg-red-800"><a class="block" href="{{ route('movies.popular') }}">Popular</a></li>
        <li class="hover:bg-red-800"><a class="block" href="{{ route('movies.now-playing') }}">Now Playing</a></li>
        <li class="hover:bg-red-800"><a class="block" href="{{ route('movies.upcoming') }}">Upcoming</a></li>
        <li class="hover:bg-red-800"><a class="block" href="{{ route('movies.top-rated') }}">Top Rated</a></li>
      </ul>
    </li>
    <li class="relative max-[1040px]:hidden dropdown group cursor-pointer">
      TV Shows
      <span><i class="fa-solid fa-chevron-down"></i></span>
      <ul class="dropdown-menu flex flex-col gap-2 absolute bg-red-900 p-3 w-40 top-full left-[-13px] rounded-sm opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
        <li class="hover:bg-red-800"><a class="block" href="{{ route('tv.popular') }}">Popular</a></li>
        <li class="hover:bg-red-800"><a class="block" href="{{ route('tv.airing') }}">Airing Today</a></li>
        <li class="hover:bg-red-800"><a class="block" href="{{ route('tv.on-tv') }}">On TV</a></li>
        <li class="hover:bg-red-800"><a class="block" href="{{ route('tv.top-rated') }}">Top Rated</a></li>
      </ul>
    </li>
    <li class="max-[1040px]:hidden"><a href="">Top IMDB</a></li>
    <li class="max-[1040px]:hidden"><a href="">People</a></li>
    <li class="max-[1040px]:hidden"><a href=""><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
    <li class="max-[1040px]:block hidden"><a href="">
      <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 960 960" fill="currentColor">
        <path d="M120 720v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/>
      </svg>
    </a></li>
  </ul>
</nav>