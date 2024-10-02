@if ($paginator->hasPages())
    <div class="flex justify-between items-center bg-white px-6 py-3 border-t dark:bg-[#2C2C2C] dark:border-gray-400">
        
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="text-gray-500 dark:text-gray-200">Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-200">Previous</a>
        @endif

        {{-- Pagination Elements --}}
        <div class="flex space-x-2">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="text-gray-500 px-3 py-1 dark:text-gray-400">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="text-white px-3 py-1 bg-blue-500 rounded dark:text-white shadow-inner">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="text-gray-500 hover:text-gray-700 px-3 py-1 dark:text-gray-400">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-200">Next</a>
        @else
            <span class="text-gray-500 dark:text-gray-200">Next</span>
        @endif
    </div>
@endif
