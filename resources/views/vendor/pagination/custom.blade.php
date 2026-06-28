@if ($paginator->hasPages())
    <nav class="pagination-bar" role="navigation" aria-label="{{ __('Pagination Navigation') }}">
        <p class="pagination-summary">
            {!! __('Showing') !!}
            @if ($paginator->firstItem())
                <strong>{{ $paginator->firstItem() }}</strong> {!! __('to') !!} <strong>{{ $paginator->lastItem() }}</strong>
            @else
                {{ $paginator->count() }}
            @endif
            {!! __('of') !!} <strong>{{ $paginator->total() }}</strong> {!! __('results') !!}
        </p>

        <span class="pagination-links">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="pagination-link pagination-link-arrow is-disabled" aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                    <x-icon name="chevron-left" class="icon-sm" />
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-link pagination-link-arrow" aria-label="{{ __('pagination.previous') }}">
                    <x-icon name="chevron-left" class="icon-sm" />
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="pagination-link is-ellipsis" aria-disabled="true">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="pagination-link is-current" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="pagination-link" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-link pagination-link-arrow" aria-label="{{ __('pagination.next') }}">
                    <x-icon name="chevron-right" class="icon-sm" />
                </a>
            @else
                <span class="pagination-link pagination-link-arrow is-disabled" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <x-icon name="chevron-right" class="icon-sm" />
                </span>
            @endif
        </span>
    </nav>
@endif
