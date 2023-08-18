@props(['popularPosts', 'lastestPosts'])

<div class="col-lg-8">
    <div class="row mb-3">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Popular</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="{{ request()->fullUrlWithQuery(['popular' => true]) }}">View All</a>
            </div>
        </div>
        @if ($popularPosts->count() > 0)
            <x-news.news-panel :posts="$popularPosts"/>
        @else
            <div class="col-lg-12"><div class="d-flex mb-3 bg-light h5 align-items-center justify-content-center px-3" style="height: 80px;">No posts yet</div></div>
        @endif

    </div>

    <x-news.center-banner />

    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Latest</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="{{ request()->fullUrlWithQuery(['lastest' => true]) }}">View All</a>
            </div>
        </div>

        @if ($lastestPosts->count() > 0)
            <x-news.news-panel :posts="$lastestPosts"/>
        @else
            <div class="col-lg-12"><div class="d-flex mb-3 bg-light h5 align-items-center justify-content-center px-3" style="height: 80px;">No posts yet</div></div>
        @endif
    </div>
</div>
