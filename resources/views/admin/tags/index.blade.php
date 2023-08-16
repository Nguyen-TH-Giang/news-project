<x-admin.layout>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tags</h1>
            <x-admin.breadcrumb :items="[
                ['label' => 'Tags'],
            ]"/>
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
                                    <div class="card-title row g-3">
                                        <div class="col-md-8"><a href="{{ route('admin.tags.create') }}" class="btn btn-warning">Add new tag</a></div>
                                        <div class="col-md-4">
                                            <form class="row g-3" method="GET" action="#">
                                                <div class="col-md-12 d-flex flex-row">
                                                  <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                                                  <button type="submit" title="Search" class="btn btn-primary rounded-pill"><i class="bi bi-search"></i></button>
                                                  <a href="{{ route('admin.tags.index') }}" class="btn btn-danger rounded-pill"><i class="bi bi-arrow-clockwise"></i></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Table with hoverable rows -->
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col" class="w-10p">Sort order</th>
                                                <th scope="col" class="w-10p">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tags as $tag)
                                            <tr>
                                                <td scope="row"><strong>{{ $tag->id }}</strong></td>
                                                <td>{{ $tag->name }}</td>
                                                <td class="text-center">{{ $tag->sort_order }}</td>
                                                <td>
                                                    <a class="btn btn-success" href="/admin/tags/{{ $tag->id }}/edit"><i class="bi bi-pencil-square"></i></a>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tagModal-{{ $tag->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>

                                                    <div class="modal fade" id="tagModal-{{ $tag->id }}" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Delete tag</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">Do you really want to delete this tag ID: {{ $tag->id }}</div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <form method="POST" action="/admin/tags/{{ $tag->id }}">
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
            {{ $tags->links() }}
            <!-- End Pagination with icons -->
        </section>

    </main><!-- End #main -->
</x-admin.layout>
