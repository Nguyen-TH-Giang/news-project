@props(['banner'])

@if (!is_null($banner) && !is_null($banner->image_url))
    <div class="col-lg-8 text-center text-lg-right">
        @php
            $path = public_path('/storage/' . $banner->image_url);
            $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $banner->image_url) : Constants::BANNER_PLACEHOLDER;
        @endphp
        <img class="img-fluid" style="width: 700px; height: 70px;" src="{{ $imageSrc }}" alt="{{ $banner->image_url }}">
    </div>
@endif
