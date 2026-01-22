import { slugify } from "./slug";

const IMAGE_URL = 'https://image.tmdb.org/t/p/w500';

/**
 * Renders movie cards into a container element.
 *
 * @param {HTMLElement} movieCardContainer
 * The container element where movie cards will be inserted.
 *
 * @param {Array<Object>} movies
 * Array of movie objects
 */
export function renderMovies(movieCardContainer, movies) {
  movieCardContainer.innerHTML = '';

  movies.forEach((movie) => {
    const slugTitle = slugify(movie.title);
    const slugURL = `/movie/${movie.id}-${slugTitle}`;
    
    let movieCard = document.createElement('div');
    movieCard.classList.add('movie-card', 'w-[200px]', 'shrink-0');

    movieCard.innerHTML = `
      <a href="${slugURL}" class="cursor-pointer">
        <img src="${IMAGE_URL}${movie.poster_path}" width="100%" alt="${movie.title}" loading="lazy">
      </a>
      <h3 class='mt-2'>${movie.title}</h3>
      <p>⭐ ${movie.vote_average.toFixed(1)}</p>
      <p>${movie.release_date}</p>
    `;

    movieCardContainer.appendChild(movieCard);
  });
}