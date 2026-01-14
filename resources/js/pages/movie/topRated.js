import { addListenerForPaginationButtons } from '../../app.js';
import { loadMoviesForPage } from '../../app.js';
import { fetchTopRatedMovies } from '../../api/movieService.js';
import { initMovie } from '../../app.js';

initMovie(fetchTopRatedMovies);
addListenerForPaginationButtons(loadMoviesForPage, fetchTopRatedMovies);