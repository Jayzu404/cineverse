export async function fetchPopularPeople(page = 1) {
  const requestUrl = `/api/people?page=${page}&category=popular`;
  const response = await fetch(requestUrl);

  if (!response.ok) {
    throw new Error(`Failed to fetch popular people, Server responded with ${response.status}: ${response.statusText}`);
  }

  const data = await response.json();

  return {
    peopleData: data.results,
    currentPage: data.page,
    totalPages: data.total_pages,
    totalResults: data.total_results
  }
}