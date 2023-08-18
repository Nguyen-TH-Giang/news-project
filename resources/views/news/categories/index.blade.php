<x-news.layout>
     <!-- Breadcrumb Start -->
     <div class="container-fluid">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">
                <a class="breadcrumb-item" href="/">Home</a>
                <span class="breadcrumb-item active">Category</span>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <x-news.news-with-sidebar>
        <div class="col-lg-8">
            @foreach ($categories as $category)
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">{{ $category->name }}</h3>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="javascript:void(0)">View All</a>
                        </div>
                    </div>
                    @if ($category->posts->count() > 0)
                        @foreach ($category->posts as $post)
                            @if ($loop->iteration <= 4)
                                <div class="col-lg-6">
                                    <x-news.big-news-item :post="$post"/>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-center bg-light h4 py-2 px-4 mb-3">
                                <div class="p-5">No posts in this category yet!</div>
                            </div>
                        </div>
                    @endif
                </div>
                @if ($loop->iteration == 1)
                    <x-news.center-banner />
                @endif
            @endforeach
            {{ $categories->links('news.pagination') }}
        </div>
    </x-news.news-with-sidebar>
</x-news.layout>
