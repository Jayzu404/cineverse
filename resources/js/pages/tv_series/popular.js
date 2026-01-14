import { addListenerForPaginationButtons } from '../../app.js';
import { loadTvShowsForPage } from '../../app.js';
import { fetchPopular } from '../../api/tvShowService.js';
import { initTvShow } from '../../app.js';

initTvShow(fetchPopular);
addListenerForPaginationButtons(loadTvShowsForPage, fetchPopular);