@if ($paginator->hasPages())
    <ul class="pagination" role="navigation" aria-label="Pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="pagination-previous disabled">
                Previous <span class="show-for-sr">page</span>
            </li>
        @else
            <li class="pagination-previous">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    Previous <span class="show-for-sr">page</span>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="current">
                            <span>
                                <span class="show-for-sr">You are on page</span> {{ $page }}
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" aria-label="Page {{ $page }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="pagination-next">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next page">
                    Next <span class="show-for-sr">page</span>
                </a>
            </li>
        @else
            <li class="pagination-next disabled">
                Next <span class="show-for-sr">page</span>
            </li>
        @endif
    </ul>
@endif
