@if ($paginator->hasPages())
    <nav class="paginate-nav">
        <ul class="paginate-inner">

            {{-- 前へ --}}
            @if ($paginator->onFirstPage())
                <li><span class="paginate-btn paginate-btn--disabled"><</span></li>
            @else
                <li><a class="paginate-btn" href="{{ $paginator->previousPageUrl() }}"><</a></li>
            @endif

            {{-- ページ番号 --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li><span class="paginate-btn paginate-btn--dots">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><span class="paginate-btn paginate-btn--active">{{ $page }}</span></li>
                        @else
                            <li><a class="paginate-btn" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- 次へ --}}
            @if ($paginator->hasMorePages())
                <li><a class="paginate-btn" href="{{ $paginator->nextPageUrl() }}">></a></li>
            @else
                <li><span class="paginate-btn paginate-btn--disabled">></span></li>
            @endif

        </ul>
    </nav>
@endif
