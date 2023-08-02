<x-news.layout>
    <x-news.news-with-sidebar>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Technology</h3>
                        <a class="text-secondary font-weight-medium text-decoration-none" href="">View
                            All</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <x-news.big-news-item />
                </div>
                <div class="col-lg-6">
                    <x-news.big-news-item />
                </div>
                <div class="col-lg-6">
                    <x-news.big-news-item />
                </div>
                <div class="col-lg-6">
                    <x-news.big-news-item />
                </div>
            </div>

            <x-news.center-banner />

            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Technology</h3>
                        <a class="text-secondary font-weight-medium text-decoration-none" href="">View
                            All</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <x-news.big-news-item />
                </div>
                <div class="col-lg-6">
                    <x-news.big-news-item />
                </div>
                <div class="col-lg-6">
                    <x-news.big-news-item />
                </div>
                <div class="col-lg-6">
                    <x-news.big-news-item />
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </x-news.news-with-sidebar>
</x-news.layout>
