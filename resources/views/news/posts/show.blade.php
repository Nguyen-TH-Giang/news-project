<x-news.layout>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">
                <a class="breadcrumb-item" href="/">Home</a>
                <a class="breadcrumb-item" href="javascript:void(0)">Category</a>
                @if (!is_null($post->category))
                    <a class="breadcrumb-item" href="javascript:void(0)">{{ ucwords($post->category->name) }}</a>
                @endif

                <span class="breadcrumb-item active">{{ $post->title }}</span>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <x-news.news-with-sidebar>
        <div class="col-lg-8">
            <!-- News Detail Start -->
            <div class="position-relative mb-3">
                @php
                    $path = public_path('/storage/' . $post->thumbnail);
                    $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $post->thumbnail) : Constants::POST_PLACEHOLDER;
                @endphp
                <img class="img-fluid w-100" src="{{ $imageSrc }}" style="object-fit: cover;">
                <div class="overlay position-relative bg-light">
                    <div class="mb-3">
                        @if (!is_null($post->category))
                            <a href="javascript:void(0)">{{ ucwords($post->category->name) }}</a>
                        @endif
                        <span class="px-1">/</span>
                        <span>{{ (\Carbon\Carbon::parse($post->published_at))->diffForHumans() }}</span>
                    </div>
                    <div>
                        <h3 class="mb-3">{{ $post->title }}</h3>
                        <p><u>Tags</u>:
                            @if (!is_null($tagNames))
                                @foreach ($tagNames as $tagName)
                                    <a href="javascript:void(0)">{{ $tagName }}</a>
                                @endforeach
                            @endif
                        </p>
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
            <!-- News Detail End -->

            <!-- Comment List Start -->
            <div class="bg-light mb-3" style="padding: 30px;">
                {{-- Facebook comment plugin here --}}
                <div class="fb-comments" data-href="http://127.0.0.1:8000/posts/{{ $post->slug }}" data-width="" data-numposts="5"></div>
            </div>
        </div>
    </x-news.news-with-sidebar>
</x-news.layout>
