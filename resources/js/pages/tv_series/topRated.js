import { addListenerForPaginationButtons } from '../../app.js';
import { loadTvShowsForPage } from '../../app.js';
import { fetchTopRated } from '../../api/tvShowService.js';
import { initTvShow } from '../../app.js';

initTvShow(fetchTopRated);
addListenerForPaginationButtons(loadTvShowsForPage, fetchTopRated);