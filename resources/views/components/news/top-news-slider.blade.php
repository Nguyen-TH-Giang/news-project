@props(['lastestPosts'])
<!-- Top News Slider Start -->
<div class="container-fluid py-3">
    <div class="container">
        @if ($lastestPosts->count() > 0)
            <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
                @foreach ($lastestPosts as $lastestPost)
                    @if ($loop->iteration <= 10)
                        <div class="d-flex">
                            @php
                                $path = public_path('/storage/' . $lastestPost->thumbnail);
                                $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $lastestPost->thumbnail) : Constants::POST_PLACEHOLDER;
                            @endphp
                            <img src="{{ $imageSrc }}" style="width: 80px; height: 80px; object-fit: cover;">
                            <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                                <a class="text-secondary font-weight-semi-bold" href="/posts/{{ $lastestPost->slug }}">{{ $lastestPost->title }}</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <div class="d-flex h4 px-3 align-items-center justify-content-center bg-light" style="height: 80px;">No posts yet!</div>
        @endif
    </div>
</div>
<!-- Top News Slider End -->
