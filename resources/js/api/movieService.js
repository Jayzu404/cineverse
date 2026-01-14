const YOUTUBE_WATCH_URL = 'https://www.youtube.com/embed/';

export async function fetchTrendingMovies(page = 1){
  const requestUrl = `/api/movies?page=${page}&category=popular`;
  const result = await fetch(requestUrl);

  if (!result.ok) {
    throw new Error("Failed to fetch trending movies.");
  }

  const data =  await result.json();

  return {
    movieData: data.results,
    currentPage: data.page,
    totalPages: data.total_pages,
    totalResults: data.total_results
  }
}

export async function fetchTopRatedMovies(page = 1){
  const requestUrl = `/api/movies?page=${page}&category=top_rated`;
  const response = await fetch(requestUrl);

  if(!response.ok) {
    throw new Error("Failed to fetch top rated movies.");
  }

  const data = await response.json();

  return {
    movieData: data.results,
    currentPage: data.page,
    totalPages: data.total_pages,
    totalResults: data.total_results
  }
}

export async function fetchNowPlayingMovies(page = 1) {
  const requestUrl = `/api/movies?page=${page}&category=now_playing`;
  const response = await fetch(requestUrl);

  if (!response.ok) {
    throw new Error("Failed to fetch now playing movies.");
  }

  const data = await response.json();

  return {
    movieData: data.results,
    currentPage: data.page,
    totalPages: data.total_pages,
    totalResults: data.total_results
  }
}

export async function fetchUpcomingMovies(page = 1) {
  const requestUrl = `/api/movies?page=${page}&category=upcoming`;
  const response = await fetch(requestUrl);

  if (!response.ok) {
    throw new Error("Failed to fetch upcoming movies.");
  }

  const data = await response.json();

  return {
    movieData: data.results,
    currentPage: data.page,
    totalPages: data.total_pages,
    totalResults: data.total_results
  }
}

export async function fetchLatestMovies(page = 1) {
  const requestUrl = `/api/movies?page=${page}&category=latest`;
  const response = await fetch(requestUrl);

  if (!response.ok) {
    throw new Error("Failed to fetch latest movies.");
  }

  const data = await response.json();

  return {
    movieData: data.results,
    currentPage: data.page,
    totalPages: data.total_pages,
    totalResults: data.total_results
  }
}

export async function getTrailerLink(movieId) {
  const requestUrl = `/api/movie/${movieId}`;
  const response = await fetch(requestUrl);

  const data = await response.json();
  const videoData = data.results.find(v => v.type === 'Trailer' && v.site === 'YouTube');

  // if movie has no youtube trailer (undefined), return null
  if (!videoData) return null;

  const watchKey = videoData.key;
  const youtubeLink = `${YOUTUBE_WATCH_URL}${watchKey}`;

  return youtubeLink;
}