@if ($paginator->hasPages())
    <nav>
        <ul class="pagination__option">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <i class="fa fa-angle-left"></i>
                </a>
            @else
                <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                   <i class="fa fa-angle-left"></i>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="" aria-disabled="true">{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="aktif" aria-current="page">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fa fa-angle-right"></i></a>
            @else
                <a aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                </a>
            @endif
        </ul>
    </nav>
@endif
