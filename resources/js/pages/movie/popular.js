import { addListenerForPaginationButtons } from '../../app.js';
import { loadMoviesForPage } from '../../app.js';
import { fetchTrendingMovies } from '../../api/movieService.js';
import { initMovie } from '../../app.js';

initMovie(fetchTrendingMovies);
addListenerForPaginationButtons(loadMoviesForPage, fetchTrendingMovies);