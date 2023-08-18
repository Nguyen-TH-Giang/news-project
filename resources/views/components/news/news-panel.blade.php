@props(['posts'])
@php
    $count = 0;
@endphp

@for ($col = 0; $col < 2; $col++)
    <div class="col-lg-6">
        @if (isset($posts[$col * 3]))
            <x-news.big-news-item :post="$posts[$col * 3]" />
            @php $count++; @endphp
        @endif
        @for ($i = 1; $i < 3; $i++)
            @if (isset($posts[$col * 3 + $i]))
                <x-news.small-news-item :post="$posts[$col * 3 + $i]" />
                @php $count++; @endphp
            @endif
        @endfor
    </div>
    {{-- More than 6 will stretch the page too long --}}
    @if ($count >= 6)
        @break
    @endif
@endfor
