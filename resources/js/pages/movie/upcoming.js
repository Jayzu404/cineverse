import { addListenerForPaginationButtons } from '../../app.js';
import { loadMoviesForPage } from '../../app.js';
import { fetchUpcomingMovies } from '../../api/movieService.js';
import { initMovie } from '../../app.js';

initMovie(fetchUpcomingMovies);
addListenerForPaginationButtons(loadMoviesForPage, fetchUpcomingMovies);