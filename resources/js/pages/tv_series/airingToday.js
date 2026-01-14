import { addListenerForPaginationButtons } from '../../app.js';
import { loadTvShowsForPage } from '../../app.js';
import { fetchAiringToday } from '../../api/tvShowService.js';
import { initTvShow } from '../../app.js';

initTvShow(fetchAiringToday);
addListenerForPaginationButtons(loadTvShowsForPage, fetchAiringToday);