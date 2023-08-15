<div class="position-relative mb-3">
    @php
        $path = public_path('/storage/' . $post->thumbnail);
        $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $post->thumbnail) : Constants::POST_PLACEHOLDER;
    @endphp
    <img class="img-fluid w-100" src="{{ $imageSrc }}" style="object-fit: cover;">
    <div class="overlay position-relative bg-light">
        <div class="mb-2" style="font-size: 14px;">
            <a href="javascript:void(0)">{{ $post->category->name ?? '' }}</a>
            <span class="px-1">/</span>
            <span>{{ (\Carbon\Carbon::parse($post->published_at))->diffForHumans() }}</span>
        </div>
        <a class="h4" href="/posts/{{ $post->slug }}" data-mh="title">{{ $post->title }}</a>
        <p class="m-0" data-mh="description">{{ $post->description }}</p>
    </div>
</div>
