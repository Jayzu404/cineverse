<aside class="filter w-80 bg-gray-800 h-fit border-r border-gray-700 hidden">
    <div class="p-6">
        <!-- Header -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-white mb-2">Filters</h2>
            <p class="text-sm text-gray-400">Refine your movie search</p>
        </div>

        <!-- Genre Filter -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-300 mb-3">Genre</label>
            <div class="space-y-2">
                <label class="flex items-center cursor-pointer group">
                    <input type="checkbox" name="genre[]" value="action" class="w-4 h-4 rounded bg-gray-700 border-gray-600 text-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0">
                    <span class="ml-3 text-sm text-gray-300 group-hover:text-white transition">Action</span>
                </label>
                <label class="flex items-center cursor-pointer group">
                    <input type="checkbox" name="genre[]" value="comedy" class="w-4 h-4 rounded bg-gray-700 border-gray-600 text-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0">
                    <span class="ml-3 text-sm text-gray-300 group-hover:text-white transition">Comedy</span>
                </label>
                <label class="flex items-center cursor-pointer group">
                    <input type="checkbox" name="genre[]" value="drama" class="w-4 h-4 rounded bg-gray-700 border-gray-600 text-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0">
                    <span class="ml-3 text-sm text-gray-300 group-hover:text-white transition">Drama</span>
                </label>
                <label class="flex items-center cursor-pointer group">
                    <input type="checkbox" name="genre[]" value="horror" class="w-4 h-4 rounded bg-gray-700 border-gray-600 text-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0">
                    <span class="ml-3 text-sm text-gray-300 group-hover:text-white transition">Horror</span>
                </label>
                <label class="flex items-center cursor-pointer group">
                    <input type="checkbox" name="genre[]" value="sci-fi" class="w-4 h-4 rounded bg-gray-700 border-gray-600 text-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0">
                    <span class="ml-3 text-sm text-gray-300 group-hover:text-white transition">Sci-Fi</span>
                </label>
                <label class="flex items-center cursor-pointer group">
                    <input type="checkbox" name="genre[]" value="thriller" class="w-4 h-4 rounded bg-gray-700 border-gray-600 text-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0">
                    <span class="ml-3 text-sm text-gray-300 group-hover:text-white transition">Thriller</span>
                </label>
            </div>
        </div>

        <!-- Rating Filter -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-300 mb-3">
                Rating
                <span class="text-blue-400 font-semibold ml-2" id="ratingValue">7.0+</span>
            </label>
            <input 
                type="range" 
                name="rating"
                min="0" 
                max="10" 
                step="0.5" 
                value="7" 
                class="w-full h-2 bg-gray-700 rounded-lg appearance-none cursor-pointer accent-blue-500"
                oninput="document.getElementById('ratingValue').textContent = this.value + '+'"
            >
            <div class="flex justify-between text-xs text-gray-500 mt-1">
                <span>0</span>
                <span>10</span>
            </div>
        </div>

        <!-- Year Range -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-300 mb-3">Release Year</label>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="text-xs text-gray-400 mb-1 block">From</label>
                    <input 
                        type="number" 
                        name="year_from"
                        placeholder="1990" 
                        class="w-full bg-gray-700 text-white placeholder-gray-500 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    >
                </div>
                <div>
                    <label class="text-xs text-gray-400 mb-1 block">To</label>
                    <input 
                        type="number" 
                        name="year_to"
                        placeholder="2024" 
                        class="w-full bg-gray-700 text-white placeholder-gray-500 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    >
                </div>
            </div>
        </div>

        <!-- Sort By -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-300 mb-2">Sort By</label>
            <select name="sort_by" class="w-full bg-gray-700 text-white rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 transition cursor-pointer">
                <option value="popularity">Popularity</option>
                <option value="rating">Rating</option>
                <option value="release_date">Release Date</option>
                <option value="title">Title (A-Z)</option>
            </select>
        </div>

        <!-- Language -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-300 mb-2">Language</label>
            <select name="language" class="w-full bg-gray-700 text-white rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 transition cursor-pointer">
                <option value="">All Languages</option>
                <option value="en">English</option>
                <option value="es">Spanish</option>
                <option value="fr">French</option>
                <option value="ja">Japanese</option>
                <option value="ko">Korean</option>
            </select>
        </div>

        <!-- Action Buttons -->
        <div class="space-y-3 pt-4 border-t border-gray-700">
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg px-4 py-2.5 transition transform hover:scale-[1.02] active:scale-[0.98]">
                Apply Filters
            </button>
            <button type="button" onclick="this.closest('form').reset()" class="w-full bg-gray-700 hover:bg-gray-600 text-gray-300 font-medium rounded-lg px-4 py-2.5 transition">
                Clear All
            </button>
        </div>

        <!-- Active Filters Count -->
        <div class="mt-4 p-3 bg-gray-700 rounded-lg">
            <p class="text-sm text-gray-300 text-center">
                <span class="font-semibold text-blue-400">{{ $activeFiltersCount ?? 0 }}</span> filters active
            </p>
        </div>
    </div>

    <style>
        /* Custom scrollbar */
        aside::-webkit-scrollbar {
            width: 6px;
        }
        aside::-webkit-scrollbar-track {
            background: #1f2937;
        }
        aside::-webkit-scrollbar-thumb {
            background: #4b5563;
            border-radius: 3px;
        }
        aside::-webkit-scrollbar-thumb:hover {
            background: #6b7280;
        }
    </style>
</aside>