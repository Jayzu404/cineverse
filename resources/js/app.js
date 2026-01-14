import './bootstrap';

const IMAGE_URL = "https://image.tmdb.org/t/p/w500";

const elements = {
  movieListContainer: document.querySelector('.movie-list-container'),
  tvShowListContainer: document.querySelector('.tv-show-list-container'),
  movieFilter: document.querySelector('.filter-wrapper .filter'),
  pagination: document.getElementById('pagination'),
  pageIndicator: document.getElementById('pageIndicator'),
  loadingSpinner: document.querySelector('#list-section #spinner'),
  prevButton: document.getElementById('prev-btn'),
  nextButton: document.getElementById('next-btn')
};

const paginationState = {
  currentPage: 1,
  totalPages: null,
  isLoading: false
};

export function showError(container, message) {
  container.className = 'flex justify-center items-center min-h-full';
  container.innerHTML = `
    <div class="error-card text-center">
      <svg class="w-16 h-16 mx-auto mb-4 text-red-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
      </svg>
      <h3 class="text-2xl">Oops Something went wrong</h3>
      <p class="text-gray-600">${message}</p>
    </div>
  `;
}

/**
 * Load movies for a specific page
 * @param {number} page - page number to load
 * @param {function} fetchFunction - function for fetching specific movies (latest, trending etc.)
  
 }}
 */
export async function loadMoviesForPage(fetchFunction, page) {
  if (paginationState.isLoading) {
    console.log('Already loading, please wait...');
    return;
  } 

  // set to laoding state
  paginationState.isLoading = true;

  elements.loadingSpinner.classList.remove('hidden');
  elements.movieFilter.classList.add('hidden');
  elements.pagination.classList.add('hidden');
  elements.movieListContainer.innerHTML = '';

  try {
    const data = await fetchFunction(page);

    paginationState.currentPage = data.currentPage;
    paginationState.totalPages = data.totalPages;

    renderMovies(data.movieData);
    updatePaginationUI();
  } 
  catch (err) {
    console.error('Something went wrong.', err);
  }
  finally {
    paginationState.isLoading = false;
  }
}

export async function loadTvShowsForPage(fetchFunction, page) {
  if (paginationState.isLoading) {
    console.log('Already loading, please wait...');
    return;
  } 

  // set to laoding state
  paginationState.isLoading = true;

  elements.loadingSpinner.classList.remove('hidden');
  elements.movieFilter.classList.add('hidden');
  elements.pagination.classList.add('hidden');
  elements.tvShowListContainer.innerHTML = '';

  try {
    const data = await fetchFunction(page);

    paginationState.currentPage = data.currentPage;
    paginationState.totalPages = data.totalPages;

    renderTvShows(data.tvShowsData);
    updatePaginationUI();
  } 
  catch (err) {
    console.error('Something went wrong.', err);
  }
  finally {
    paginationState.isLoading = false;
  }
}

/**
 * Render Movies to the DOM
 * @param {Array} movies - Array of movie objects
 */
export function renderMovies(movies) {
  elements.movieListContainer.innerHTML = '';

  window.scrollTo({ top: 0, behavior: 'smooth' });

  elements.loadingSpinner.classList.add('hidden');
  elements.movieFilter.classList.remove('hidden');
  elements.pagination.classList.remove('hidden');

  movies.forEach(movie => {
    const movieCard = document.createElement('div');
    movieCard.classList.add('shrink-0', 'rounded-sm', 'overflow-hidden');

    movieCard.innerHTML = `
      <img src="${IMAGE_URL}/${movie.poster_path}" alt="${movie.title}" loading="lazy" class="w-full h-auto">
      <h3 class="text-sm">${movie.title}</h3>
      <p class="text-sm">⭐ ${movie.vote_average.toFixed(1)}</p>
      <p class="text-sm">${movie.release_date}</p>
    `;

    elements.movieListContainer.appendChild(movieCard);
  });
}

export function renderTvShows(tvShows) {
  elements.tvShowListContainer.innerHTML = '';

  window.scrollTo({ top: 0, behavior: 'smooth' });

  elements.loadingSpinner.classList.add('hidden');
  elements.movieFilter.classList.remove('hidden');
  elements.pagination.classList.remove('hidden');

  tvShows.forEach(tvShow => {
    const movieCard = document.createElement('div');
    movieCard.classList.add('shrink-0', 'rounded-sm', 'overflow-hidden');

    movieCard.innerHTML = `
      <img src="${IMAGE_URL}/${tvShow.poster_path}" alt="${tvShow.name}" loading="lazy" class="w-full h-auto">
      <h3 class="text-sm">${tvShow.name}</h3>
      <p class="text-sm">⭐ ${tvShow.vote_average.toFixed(1)}</p>
      <p class="text-sm">${tvShow.first_air_date}</p>
    `;

    elements.tvShowListContainer.appendChild(movieCard);
  });
}

/**
 * @param {function} fetchFunction - function for fetching specific movies (latest, trending etc.)
 */
export function addListenerForPaginationButtons(contentLoader, fetchFunction) { // e consult ni (may sense ba na e export ko ni)
  // prev button
  elements.prevButton.addEventListener('click', () => {
    contentLoader(fetchFunction, paginationState.currentPage - 1);
  });

  // next button
  elements.nextButton.addEventListener('click', () => {
    contentLoader(fetchFunction, paginationState.currentPage + 1);
  });
}

function updatePaginationUI() {
  elements.pageIndicator.textContent = `Page ${paginationState.currentPage} of ${paginationState.totalPages}`;

  // for prev button
  if (paginationState.currentPage <= 1) {
    elements.prevButton.disabled = true;
    elements.prevButton.classList.remove('cursor-pointer', 'opacity-100', 'hover:underline');
    elements.prevButton.classList.add('cursor-not-allowed', 'opacity-50');
  } else {
    elements.prevButton.disabled = false;
    elements.prevButton.classList.remove('cursor-not-allowed', 'opacity-50');
    elements.prevButton.classList.add('cursor-pointer', 'opacity-100', 'hover:underline');
  }

  // for next button
  if (paginationState.currentPage >= paginationState.totalPages) {
    elements.nextButton.disabled = true;
    elements.nextButton.classList.remove('cursor-pointer', 'opacity-100', 'hover:underline');
    elements.nextButton.classList.add('cursor-not-allowed', 'opacity-50');
  } else {
    elements.nextButton.disabled = false;
    elements.nextButton.classList.remove('cursor-not-allowed', 'opacity-50');
    elements.nextButton.classList.add('cursor-pointer', 'opacity-100', 'hover:underline');
  }
}

/**
 * @param {function} fetchFunction - function for fetching specific movies (latest, trending etc.)
 */
export async function initMovie(fetchFunction) {
  try {
    await loadMoviesForPage(fetchFunction, 1);
  }
  catch (err) {
    console.error('Something went wrong!', err);
    showError(elements.movieListContainer, 'Unable to get trending movies, Please try again later.')
  }
}

export async function initTvShow(fetchFunction) {
  try {
    await loadTvShowsForPage(fetchFunction, 1);
  }
  catch (err) {
    console.error('Something went wrong', err);
  }
}