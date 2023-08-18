<x-news.layout>
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="d-flex justify-content-center col-lg-12">
                            <p>You are looking at
                                @if (!empty($indicator))
                                    <strong>{{ $indicator }}</strong>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        {{-- 4 posts here --}}
                        @foreach ($posts as $post)
                            @if ($loop->iteration <= 4)
                                <div class="col-lg-6">
                                    <div class="position-relative mb-3">
                                        @php
                                            $path = public_path('/storage/' . $post->thumbnail);
                                            $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $post->thumbnail) : Constants::POST_PLACEHOLDER;
                                        @endphp
                                        <img class="img-fluid w-100" src="{{ $imageSrc }}" style="object-fit: cover;">
                                        <div class="overlay position-relative bg-light">
                                            <div class="mb-2" style="font-size: 14px;">
                                                <a href="/?category={{ $post->category->slug ?? ''  }}">{{ $post->category->name ?? ''  }}</a>
                                                <span class="px-1">/</span>
                                                <span>{{ (\Carbon\Carbon::parse($post->published_at))->diffForHumans() }}</span>
                                            </div>
                                            <a class="h4" href="/posts/{{ $post->slug }}" data-mh="title">{{ $post->title }}</a>
                                            <p class="m-0" data-mh="description">{{ $post->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>

                    {{-- <div class="mb-3">
                        <a href=""><img class="img-fluid w-100" src="news/img/ads-700x70.jpg" alt=""></a>
                    </div> --}}
                    <x-news.center-banner />

                    <div class="row">
                        {{-- 10 posts here --}}
                        @foreach ($posts as $post)
                            @if ($loop->iteration <= 14 && $loop->iteration > 4)
                                <div class="col-lg-6">
                                    <div class="d-flex mb-3">
                                        @php
                                            $path = public_path('/storage/' . $post->thumbnail);
                                            $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $post->thumbnail) : Constants::POST_PLACEHOLDER;
                                        @endphp
                                        <img src="{{ $imageSrc }}" style="width: 100px; height: 100px; object-fit: cover;">
                                        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                            <div class="mb-1" style="font-size: 13px;">
                                                <a href="/?category={{ $post->category->slug ?? ''  }}">{{ $post->category->name ?? ''  }}</a>
                                                <span class="px-1">/</span>
                                                <span>{{ (\Carbon\Carbon::parse($post->published_at))->diffForHumans() }}</span>
                                            </div>
                                            <a class="h6 m-0" href="/posts/{{ $post->slug }}" data-mh="title">{{ $post->title }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    {{-- Pagination here --}}
                    {{ $posts->links('news.pagination') }}
                </div>
            </div>
        </div>
    </div>
    </div>
</x-news.layout>
