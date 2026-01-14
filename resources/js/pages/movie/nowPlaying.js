import { addListenerForPaginationButtons } from '../../app.js';
import { loadMoviesForPage } from '../../app.js';
import { fetchNowPlayingMovies } from '../../api/movieService.js';
import { initMovie } from '../../app.js';

initMovie(fetchNowPlayingMovies);
addListenerForPaginationButtons(loadMoviesForPage, fetchNowPlayingMovies);