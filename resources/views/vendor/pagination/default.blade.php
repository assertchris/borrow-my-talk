@if ($paginator->hasPages())
    <div class="flex items-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-2 text-grey-darkest no-underline">@svg('left-arrow')</span>
        @else
            <a
                class="px-3 py-2 text-brand-light hover:bg-brand-lightest no-underline"
                href="{{ $paginator->previousPageUrl() }}"
                rel="prev"
            >
                @svg('left-arrow')
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="px-3 py-2 text-grey-darkest no-underline">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-2 bg-brand-lightest text-grey-darkest no-underline">{{ $page }}</span>
                    @else
                        <a class="px-3 py-2 hover:bg-brand-lightest text-brand-light no-underline" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="px-3 py-2 hover:bg-brand-lightest text-brand-light no-underline" href="{{ $paginator->nextPageUrl() }}" rel="next">@svg('right-arrow')</a>
        @else
            <span class="px-3 py-2 hover:bg-brand-lightest text-grey-darkest no-underline">@svg('right-arrow')</span>
        @endif
    </div>
@endif
