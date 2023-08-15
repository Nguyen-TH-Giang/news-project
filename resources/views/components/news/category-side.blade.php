<div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
    <h3 class="m-0">Categories</h3>
    <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
</div>

@foreach ($categories as $category)
    @if ($loop->iteration <= 4)
        <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
            @php
                $path = public_path('/storage/' . $category->image_url);
                $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $category->image_url) : Constants::CATEGORY_PLACEHOLDER;
            @endphp
            <img class="img-fluid w-100 h-100" src="{{ $imageSrc }}" style="object-fit: cover;">
            <a href="" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                {{ ucfirst($category->name) }}
            </a>
        </div>
    @else
        @break
    @endif
@endforeach
