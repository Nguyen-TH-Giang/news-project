@props(['post'])

<div class="d-flex mb-3">
    @php
        $path = public_path('/storage/' . $post->thumbnail);
        $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $post->thumbnail) : Constants::POST_PLACEHOLDER;
    @endphp
    <img src="{{ $imageSrc }}" style="width: 100px; height: 100px; object-fit: cover;">
    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
        style="height: 100px;">
        <div class="mb-1" style="font-size: 13px;">
            <a href="/posts/{{ $post->slug }}">{{ $post->category->name ?? '' }}</a>
            <span class="px-1">/</span>
            <span>{{ (\Carbon\Carbon::parse($post->published_at))->diffForHumans() }}</span>
        </div>
        <a class="h6 m-0" href="">{{ $post->title }}</a>
    </div>
</div>
