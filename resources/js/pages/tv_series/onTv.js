import { addListenerForPaginationButtons } from '../../app.js';
import { loadTvShowsForPage } from '../../app.js';
import { fetchOnTv } from '../../api/tvShowService.js';
import { initTvShow } from '../../app.js';

initTvShow(fetchOnTv);
addListenerForPaginationButtons(loadTvShowsForPage, fetchOnTv);