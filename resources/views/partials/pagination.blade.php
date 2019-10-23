<style>
    .pages {
        list-style: none;
        padding-left: 0;
        text-align: center;
        padding-top: 10px;
    }

    .pages li {
        width: 20px;
        height: 20px;
        border: 2px solid #8b8a8a;
        display: inline-block;
        cursor: pointer;
    }

    .pages li.active ,
    .pages li:hover {background-color: #8b8a8a;}

</style>

@if ($paginator->hasPages())
    <ul class="pages">
        {{-- Previous Page Link --}}
        @if ( ! $paginator->onFirstPage() )
            <a class="page-link left carousel-control" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
        @else
            <a class="page-link right carousel-control disabled">&raquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="  disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="  active"><span class="page-link"></span></li>
                    @else
                        <li class=" "><a class="page-link" href="{{ $url }}"></a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="page-link right carousel-control" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
        @else
            <a class="page-link right carousel-control disabled">&raquo;</a>
        @endif
    </ul>
@endif
