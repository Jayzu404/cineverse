import './bootstrap';

const API_KEY = 'aea3f25664ae2fed0592991b0ab3e1bd';
const BASE_URL = 'https://api.themoviedb.org/3';
const IMAGE_BASE = "https://image.tmdb.org/t/p/w500";


async function fetchTrendingMovies() {
  const response = await fetch(
    `${BASE_URL}/trending/movie/day?api_key=${API_KEY}` // https://api.themoviedb.org/3/movie/popular
  );

  console.log(response);

  if (!response.ok) {
    throw new Error("Failed to fetch trending movies");
  }

  const data = await response.json();
  return data.results;
}

// ==========================
// RENDER MOVIES TO DOM
// ==========================
function renderTrendingMovies(movies) {
  const container = document.querySelector(".trending-movies");
  container.innerHTML = "";

  movies.forEach(movie => {
    const card = document.createElement("div");
    card.classList.add("movie-card", "w-[200px]", "flex-shrink-0");

    const poster = movie.poster_path
      ? IMAGE_BASE + movie.poster_path
      : "no-poster.png";

    card.innerHTML = `
      <img 
        class="w-full"
        src="${poster}" 
        alt="${movie.title}" 
        loading="lazy"
      />
      <h3>${movie.title}</h3>
      <p>⭐ ${movie.vote_average.toFixed(1)}</p>
    `;

    container.appendChild(card);
  });
}

// ==========================
// INIT APP
// ==========================
async function initTrendingMovies() {
  try {
    const movies = await fetchTrendingMovies();
    renderTrendingMovies(movies);
  } catch (error) {
    console.error(error);
    document.getElementById("trending-movies").innerHTML =
      "<p>Failed to load trending movies.</p>";
  }
}

// ==========================
// RUN ON PAGE LOAD
// ==========================
initTrendingMovies();

// console.log(fetchTrendingMovies());
// console.log(`${BASE_URL}/trending/movie/day?api_key=${API_KEY}`);

// confusions below 

// import './bootstrap';

// const API_KEY = 'aea3f25664ae2fed0592991b0ab3e1bd';
// const BASE_URL = 'https://api.themoviedb.org/3';
// const IMAGE_URL = 'https://image.tmdb.org/t/p/w500';

// async function fetchTrendingMovies(){
//   const trendingMoviesUrl = `${BASE_URL}/trending/movie/day?api_key=${API_KEY}`;

//   const result = await fetch(trendingMoviesUrl);

//   if (!result.ok) {
//     throw new Error("Failed to fetch trending movies.");
//   }

//   const data =  await result.json();

//   console.log("hi from line 18", data);

//   return data.results;
// }

// const p = fetchTrendingMovies();
// console.log("hi from line 24", p);

// setTimeout(() => {
//   console.log("hi from line 27", p);
// }, 2000);

// fetchTrendingMovies().then(movies => console.log("movies: ", movies))