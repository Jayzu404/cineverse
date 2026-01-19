import { addListenerForPaginationButtons } from '../../app.js';
import { loadPeopleForPage } from '../../app.js';
import { fetchPopularPeople } from '../../api/peopleService';
import { initPeople } from '../../app.js';

initPeople(fetchPopularPeople);
addListenerForPaginationButtons(loadPeopleForPage, fetchPopularPeople);