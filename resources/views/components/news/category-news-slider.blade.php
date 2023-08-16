@props(['categories'])

<div class="container-fluid">
    <div class="container">
        <div class="row">
            @if ($categories->count() > 0)
                @foreach ($categories as $category)
                    <div class="col-lg-6 py-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">{{ $category->name }}</h3>
                        </div>
                        @if ($category->posts->count() > 0)
                            <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                                {{-- A post --}}
                                @foreach ($category->posts as $post)
                                    @if ($loop->iteration <= 5)
                                        <div class="position-relative">
                                            @php
                                                $path = public_path('/storage/' . $post->thumbnail);
                                                $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $post->thumbnail) : Constants::POST_PLACEHOLDER;
                                            @endphp
                                            <img class="img-fluid w-100" src="{{ $imageSrc }}" style="object-fit: cover;">
                                            <div class="overlay position-relative bg-light">
                                                <div class="mb-2" style="font-size: 13px;">
                                                    <a href="javascript:void(0)">{{ $category->name }}</a>
                                                    <span class="px-1">/</span>
                                                    <span>{{ (\Carbon\Carbon::parse($post->published_at))->timezone('Asia/Ho_Chi_Minh')->format('F j, Y g:i A') }}</span>
                                                </div>
                                                <a class="h4 m-0" href="/posts/{{ $post->slug }}" data-mh="title">{{ $post->title }}</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <div class="d-flex align-items-center justify-content-center h4 p-5 bg-light">No posts in this category yet!</div>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3"><h3 class="m-0">No category yet!</h3></div>
                </div>
            @endif
        </div>
    </div>
</div>
