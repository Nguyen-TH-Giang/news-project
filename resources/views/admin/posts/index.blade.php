<x-admin.layout>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Posts</h1>
            <x-admin.breadcrumb :items="[['label' => 'Posts']]" />
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Top Views -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{ route('admin.posts.create') }}" class="btn btn-warning">Add new post</a></h5>

                                    <!-- Table with hoverable rows -->
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Thumbnail</th>
                                                <th scope="col">Title</th>
                                                <th scope="col" class="w-10p">Trending</th>
                                                <th scope="col" class="w-10p">Status</th>
                                                <th scope="col" class="w-10p">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                                <tr>
                                                    <th scope="row">{{ $post->id }}</th>
                                                    <th scope="row">@if ($post->category !== null) {{ $post->category->name }} @endif</th>
                                                    <th scope="row">
                                                        @php
                                                            $path = public_path('/storage/' . $post->thumbnail);
                                                            $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $post->thumbnail) : Constants::POST_PLACEHOLDER;
                                                        @endphp
                                                        <img src="{{ $imageSrc }}">
                                                    </th>
                                                    <td>{{ $post->title }}</td>
                                                    <td>{{ $post->trending }}</td>
                                                    <td>{{ $post->status }}</td>
                                                    <td>
                                                        <a class="btn btn-success" href="/admin/posts/{{ $post->id }}/edit"><i class="bi bi-pencil-square"></i></a>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postModal-{{ $post->id }}">
                                                            <i class="bi bi-trash"></i>
                                                        </button>

                                                        <div class="modal fade" id="postModal-{{ $post->id }}" tabindex="-1">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Delete post</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">Do you really want to delete this post ID: {{ $post->id }}</div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <form method="POST" action="/admin/posts/{{ $post->id }}">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-primary">Delete</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- End Vertically centered Modal-->
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- End Table with hoverable rows -->

                                </div>
                            </div>
                        </div><!-- End Top Views -->

                    </div>
                </div><!-- End Left side columns -->

            </div>
            <!-- Pagination with icons -->
            {{ $posts->links() }}
            <!-- End Pagination with icons -->
        </section>

    </main><!-- End #main -->
</x-admin.layout>
