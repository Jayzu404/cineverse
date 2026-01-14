export async function fetchPopular(page = 1) {
  const response = await fetch(`/api/tv-show?page=${page}&category=popular`);

  if (!response.ok) {
    throw new Error(`Failed to fetch popular shows. Server responded with ${response.status}: ${response.statusText}`);
  }

  const data = await response.json();

  return {
    tvShowsData: data.results,
    currentPage: data.page,
    totalPages: data.total_pages,
    totalResults: data.total_results
  }
}

export async function fetchAiringToday(page = 1) {
  const response = await fetch(`/api/tv-show?page=${page}&category=airing_today`);

  if (!response.ok) {
    throw new Error(`Failed to fetch airing today shows. Server responded with ${response.status}: ${response.statusText}`);
  }

  const data = await response.json();

  return {
    tvShowsData: data.results,
    currentPage: data.page,
    totalPages: data.total_pages,
    totalResults: data.total_results
  }
}

export async function fetchOnTv(page = 1) {
  const response = await fetch(`/api/tv-show?page=${page}&category=on_the_air`);

  if (!response.ok) {
    throw new Error(`Failed to fetch on the air shows. Server responded with ${response.status}: ${response.statusText}`);
  }

  const data = await response.json();

  return {
    tvShowsData: data.results,
    currentPage: data.page,
    totalPages: data.total_pages,
    totalResults: data.total_results
  }
}

export async function fetchTopRated(page = 1) {
  const response = await fetch(`/api/tv-show?page=${page}&category=top_rated`);

  if (!response.ok) {
    throw new Error(`Failed to fetch top rated shows. Server responded with ${response.status}: ${response.statusText}`);
  }

  const data = await response.json();

  return {
    tvShowsData: data.results,
    currentPage: data.page,
    totalPages: data.total_pages,
    totalResults: data.total_results
  }
}