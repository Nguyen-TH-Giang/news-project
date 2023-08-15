@props(['featuredPosts'])

<!-- Featured News Slider Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Featured</h3>
            <a class="text-secondary font-weight-medium text-decoration-none" href="javascript:void(0)">View All</a>
        </div>
        @if ($featuredPosts->count() > 0)
            <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">

                @foreach ($featuredPosts as $featuredPost)
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        @php
                            $path = public_path('/storage/' . $featuredPost->thumbnail);
                            $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $featuredPost->thumbnail) : Constants::POST_PLACEHOLDER;
                        @endphp
                        <img class="img-fluid w-100 h-100" src="{{ $imageSrc }}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1" style="font-size: 13px;">
                                <a class="text-white" href="">{{ $featuredPost->category->name ?? '' }}</a>
                                <span class="px-1 text-white">/</span>
                                <a class="text-white" href="">{{ (\Carbon\Carbon::parse($featuredPost->published_at))->diffForHumans() }}</a>
                            </div>
                            <a class="h4 m-0 text-white" href="/posts/{{ $featuredPost->slug }}">{{ $featuredPost->title }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="d-flex align-items-center justify-content-center h4 p-5 bg-light" href="">No posts is featured yet!</div>
        @endif
    </div>
</div>
</div>
<!-- Featured News Slider End -->
