<x-admin.layout>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Categories</h1>
            <x-admin.breadcrumb :items="[
                ['label' => 'Categories'],
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
                                        <div class="col-md-8"><a href="{{ route('admin.categories.create') }}" class="btn btn-warning">Add new category</a></div>
                                        <div class="col-md-4">
                                            <form class="row g-3" method="GET" action="#">
                                                <div class="col-md-12 d-flex flex-row">
                                                  <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                                                  <button type="submit" title="Search" class="btn btn-primary rounded-pill"><i class="bi bi-search"></i></button>
                                                  <a href="{{ route('admin.categories.index') }}" class="btn btn-danger rounded-pill"><i class="bi bi-arrow-clockwise"></i></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Table with hoverable rows -->
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Parent category</th>
                                                <th scope="col">Name</th>
                                                <th scope="col" class="w-10p">Sort order</th>
                                                <th scope="col" class="w-10p">Status</th>
                                                <th scope="col" class="w-10p">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <th scope="row">{{ $category->id }}</th>
                                                    <td>{{ $category->parent_id }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->sort_order }}</td>
                                                    <td>{{ $category->status }}</td>
                                                    <td>
                                                        <a class="btn btn-success" href="/admin/categories/{{ $category->id }}/edit"><i class="bi bi-pencil-square"></i></a>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal-{{ $category->id }}">
                                                            <i class="bi bi-trash"></i>
                                                        </button>

                                                        <div class="modal fade" id="categoryModal-{{ $category->id }}" tabindex="-1">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Delete category</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">Do you really want to delete this category ID: {{ $category->id }}</div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <form method="POST" action="/admin/categories/{{ $category->id }}">
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
            {{ $categories->links() }}
            <!-- End Pagination with icons -->
        </section>

    </main><!-- End #main -->
</x-admin.layout>
