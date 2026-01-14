<div class="fixed z-[9998] inset-0 bg-black/40 hidden" id="video-modal-backdrop">
    <div class="fixed z-[9999] bg-black top-10 bottom-20 left-[15%] right-[15%] rounded-md overflow-hidden" id="video-modal">
        <div class="flex flex-col h-full">
            <div class="p-4 flex justify-between">
                <h4>Preview</h4>
                <button id="vd-modal-close" class="cursor-pointer">close</button>
            </div>
            <div class="relative w-full flex-1">
                {{-- spinner animation --}}
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 animate-spin rounded-full h-12 w-12 border-b-2 border-white hidden" id="spinner"></div>

                <iframe class="w-full h-full" src="" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</div>