@if (!is_null($banner) && !is_null($banner->image_url))
    <div class="mb-3 pb-3">
        @php
            $path = public_path('/storage/' . $banner->image_url);
            $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $banner->image_url) : Constants::BANNER_PLACEHOLDER;
        @endphp
        <img class="img-fluid" src="{{ $imageSrc }}" alt="{{ $banner->image_url }}">
    </div>
@endif
