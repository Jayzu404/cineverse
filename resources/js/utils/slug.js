/**
 * Slugify a text
 * @param {string} text 
 * @returns slug 
 */
export function slugify(text) {
  return text
    .toLowerCase()             // Lowercase all characters
    .trim()                    // Removes white spaces
    .replace(/[^\w\s-]/g, '')  // Remove non-word chars (except spaces and hyphens)
    .replace(/[\s_]+/g, '-')   // Replace spaces and underscores with a single hyphen
    .replace(/-+/g, '-')       // Replace multiple hyphens with a single hyphen
    .replace(/^-+|-+$/g, '');  // Remove leading/trailing hyphens
}