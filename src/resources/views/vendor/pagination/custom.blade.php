@if ($paginator->hasPages())
    <nav class="pagination">
        @if ($paginator->onFirstPage())
            <span class="pagination__link disabled" aria-disabled="true">&lt;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination__link" rel="prev">&lt;</a>
        @endif

        @php
        $maxPages = 3;
        $currentPage = $paginator->currentPage();
        $startPage = 1;
        $endPage = $maxPages;
        @endphp

        @for ($page = $startPage; $page <= $endPage; $page++)
            @if ($page == $currentPage)
                <span class="pagination__link active" aria-current="page">{{ $page }}</span>
            @else
                <a href="{{ $paginator->url($page) }}" class="pagination__link">{{ $page }}</a>
            @endif
        @endfor

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination__link" rel="next">&gt;</a>
        @else
            <span class="pagination__link disabled" aria-disabled="true">&gt;</span>
        @endif
    </nav>
@endif