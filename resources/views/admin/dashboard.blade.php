<x-admin.layout>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Page Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-text"></i>
                                        </div>
                                        <div class="ps-3">
                                            <a href="{{ route('admin.posts.index') }}"><h6>Posts</h6></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Page Card -->

                        <!-- Page Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-list-stars"></i>
                                        </div>
                                        <div class="ps-3">
                                            <a href="{{ route('admin.categories.index') }}"><h6>Categories</h6></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Page Card -->

                        <!-- Page Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-tags"></i>
                                        </div>
                                        <div class="ps-3">
                                            <a href="{{ route('admin.tags.index') }}"><h6>Tags</h6></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Page Card -->

                        <!-- Page Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-megaphone"></i>
                                        </div>
                                        <div class="ps-3">
                                            <a href="{{ route('admin.banners.index') }}"><h6>Banner ads</h6></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Page Card -->

                        <!-- Page Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                        <div class="ps-3">
                                            <a href="{{ route('admin.contacts.index') }}"><h6>Contacts</h6></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Page Card -->

                        <!-- Page Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <a href="{{ route('admin.generals.index') }}"><h6>Generals</h6></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Page Card -->

                        <!-- Page Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-mailbox"></i>
                                        </div>
                                        <div class="ps-3">
                                            <a href="{{ route('admin.newsletter.index') }}"><h6>Newsletter</h6></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Page Card -->


                        <!-- Top Views -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Top 5 views <span>of all time</span></h5>

                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Thumbnail</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Views</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                                <tr>
                                                    <td><strong>{{ $post->id }}</strong></td>
                                                    <th scope="row">
                                                        @php
                                                            $path = public_path('/storage/' . $post->thumbnail);
                                                            $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $post->thumbnail) : Constants::POST_PLACEHOLDER;
                                                        @endphp
                                                        <img src="{{ $imageSrc }}">
                                                    </th>
                                                    <td>
                                                        <a href="admin/posts/{{ $post->id }}/edit" class="text-primary fw-bold">
                                                            {{ $post->title }}
                                                        </a>
                                                    </td>
                                                    <td>{{ number_format($post->view_count, 0, '', ',') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div><!-- End Top Views -->

                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>

    </main><!-- End #main -->
</x-admin.layout>
