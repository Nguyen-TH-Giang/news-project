@props(['popularPosts'])

<!-- Main News Slider Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if ($popularPosts->count() > 0)
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                        @foreach ($popularPosts as $popularPost)
                            <div class="position-relative overflow-hidden" style="height: 435px;">
                                @php
                                    $path = public_path('/storage/' . $popularPost->thumbnail);
                                    $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $popularPost->thumbnail) : Constants::POST_PLACEHOLDER;
                                @endphp
                                <img class="img-fluid h-100" src="{{ $imageSrc }}" style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-1">
                                        <a class="text-white" href="/?category={{ $popularPost->category->slug ?? ''  }}">{{ $popularPost->category->name ?? '' }}</a>
                                        <span class="px-2 text-white">/</span>
                                        <a class="text-white" href="">{{ \Carbon\Carbon::parse($popularPost->published_at)->diffForHumans() }}</a>
                                    </div>
                                    <a class="h2 m-0 text-white font-weight-bold" href="/posts/{{ $popularPost->slug }}">{{ $popularPost->title }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="d-flex h4 px-3 align-items-center justify-content-center bg-light" style="height: 435px;">No posts yet!</div>
                @endif
            </div>
            <div class="col-lg-4">
                <x-news.category-side />
            </div>
        </div>
    </div>
</div>
<!-- Main News Slider End -->
