const IMAGE_URL = 'https://image.tmdb.org/t/p/w500';

export function renderMovies(movieCardContainer, movies) {
  movieCardContainer.innerHTML = '';

  movies.forEach((movie) => {
    let movieCard = document.createElement('div');
    movieCard.classList.add('movie-card', 'w-[200px]', 'shrink-0');

    movieCard.innerHTML = `
      <img src="${IMAGE_URL}${movie.poster_path}" width="100%" alt="${movie.title}" loading="lazy">
      <h3 class='mt-2'>${movie.title}</h3>
      <p>⭐ ${movie.vote_average.toFixed(1)}</p>
      <p>${movie.release_date}</p>
    `;

    movieCardContainer.appendChild(movieCard);
  });
}