import { fetchTrendingMovies, fetchTopRatedMovies, getTrailerLink } from '../api/movieService.js';
import { renderMovies } from '../utils/renderMovies.js';

const IMAGE_URL = 'https://image.tmdb.org/t/p/w500';
const videoModalCloseBtn = document.getElementById('vd-modal-close');
const modalIframe  = document.querySelector('#video-modal iframe');
const videoModalBackdrop = document.getElementById('video-modal-backdrop');
const spinner = document.getElementById('spinner');
const trailerLoadingSkeleton = document.getElementById('trailer-skeleton-cards');

// Containers for different sections
const containers = {
  trendingMovies: document.querySelector('.trending-movies'),
  topRatedMovies: document.querySelector('.top-rated-movies'),
  trendingTrailers: document.querySelector('.trending-trailers'),
  trendingMovieCard: document.querySelector('.trending-movies .movie-card-container'),
  topRatedMovieCard: document.querySelector('.top-rated-movies .movie-card-container')
};
// ========================== 

/**
 * Display error message for specific container
 * @param {string} container - DOM element where error message will be displayed
 * @param {string} message - Error message to be displayed
 */

function errorForContainer(container, message){
  container.innerHTML = `
    <div class="relative z-100 py-30 flex flex-col justify-center items-center">
      <svg class="w-16 h-16 mx-auto mb-4 text-red-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <h3 class="text-2xl">Oops! Something went wrong.</h3>
      <p class="text-md">${message}</p>
    </div>
  `;
}

document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape' && !videoModalBackdrop.classList.contains('hidden')) {
    closeModal();
  }
});

videoModalCloseBtn.addEventListener('click', () => {
  closeModal();
});

videoModalBackdrop.addEventListener('click', (e) => {
  if (e.target === videoModalBackdrop) {
    closeModal();
  }
});

function closeModal() {
  videoModalBackdrop.classList.add('hidden');
  modalIframe.src = '';
}

function openVideoModal(trailerLink) {
  videoModalBackdrop.classList.remove('hidden');
  spinner.classList.remove('hidden'); // show spinner while loading iframe

  modalIframe.src = trailerLink
  modalIframe.onload = () => {
    spinner.classList.add('hidden'); // hide spinner when iframe is loaded
  };
}

// Helpers for changing background image of trailer section
function changeTrailerSectionBg(backdropPath) {
  containers.trendingTrailers.style.backgroundImage = `url(${IMAGE_URL}${backdropPath})`;
}
// ==========================

/**
 * Fetch movie trailers and displays it in the UI
 * @param {Array<Object>} trendingMovies - Array of trending movie objects
 */
async function renderTrailers(trendingMovies) {
  let firstTrailerLoaded = false;
  
  const trailerPromise = trendingMovies.map(async (movie) =>
  {
    try
    {
      const trailerLink = await getTrailerLink(movie.id);

      // return if trailer link is undefined (some movies don't have trailer)
      if (!trailerLink) {
        return;
      }

      await renderSingleTrailer(trailerLink, movie);

      if (!firstTrailerLoaded) {
        firstTrailerLoaded = true;
        hideTrailerSkeletonLoader();
        setTrailerInitialBackground(movie.backdrop_path);
      }
    }
    catch (err) {
      console.error(`Failed to load trailer for movie id: ${movie.id} -`, err);
    }
  })

  await Promise.allSettled(trailerPromise);
}  

function hideTrailerSkeletonLoader() {
  trailerLoadingSkeleton.classList.add('hidden');
}

function setTrailerInitialBackground(firstTrailerBackdropPath) {
  containers.trendingTrailers.style.backgroundImage = `url(${IMAGE_URL}${firstTrailerBackdropPath})`;
}

/**
 * Render single movie trailer
 * @param {string} trailerLink - iframe src link
 * @param {object} movie - movie object that contains all info (title, backfrop_path etc.)
 */
async function renderSingleTrailer(trailerLink, movie){
  const trendingTrailersContainer = document.getElementById('trending-trailers-container');

  const trailerCard = document.createElement('div');
  trailerCard.classList.add('trailer-card', 'relative', 'h-[180px]', 'w-[300px]', 'shrink-0');
  const overlay = document.createElement('div');
  overlay.classList.add('video-overlay', 'absolute', 'inset-0', 'bg-zinc-100', 'cursor-pointer', 'opacity-0');

  const iframe = document.createElement('iframe');
  iframe.width = "100%";
  iframe.height = "100%";
  iframe.src = trailerLink;
  iframe.allow = "autoplay; encrypted-media";
  iframe.allowFullscreen = true;
  iframe.loading = "lazy";
  iframe.style.borderRadius = "12px";

  trendingTrailersContainer.appendChild(trailerCard);
  trailerCard.appendChild(overlay);
  trailerCard.appendChild(iframe); 

  overlay.addEventListener('click', () => {
    openVideoModal(trailerLink);
  });

  overlay.addEventListener('mouseover', () => {
    changeTrailerSectionBg(movie.backdrop_path);
  }); 

  return new Promise((resolve) => {
    iframe.onload = () => resolve();  
  })
}

async function initTopRatedMovies(){
  try {
    const data = await fetchTopRatedMovies();
    renderMovies(containers.topRatedMovieCard, data.movieData);
  }
  catch (err) {
    console.error('Something went wrong ', err);
    errorForContainer(containers.topRatedMovies, 'Unable to load top rated movies.');
  }
}

async function initTrendingMovies(){
  try {
    const data = await fetchTrendingMovies();
    renderMovies(containers.trendingMovieCard, data.movieData);
  }
  catch (err) {
    console.error('Something went wrong ', err);
    errorForContainer(containers.trendingMovies, 'Unable to load trending movies.');
  }
}

async function initTrailers(){
  try {
    const data = await fetchTrendingMovies();
    await renderTrailers(data.movieData);
  }
  catch (err) {
    console.error('Something went wrong ', err);
    errorForContainer(containers.trendingTrailers, 'Unable to load trending trailers.');
  }
}

initTopRatedMovies();
initTrendingMovies();
initTrailers();