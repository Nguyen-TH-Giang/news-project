<x-admin.layout>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Newsletters</h1>
            <x-admin.breadcrumb :items="[['label' => 'Newsletters']]" />
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
                                    <div class="card-title row g-3 align-items-end flex-column">
                                        <div class="col-md-4">
                                            <form class="row g-3" method="GET" action="#">
                                                <div class="col-md-12 d-flex flex-row">
                                                  <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                                                  <button type="submit" title="Search" class="btn btn-primary rounded-pill"><i class="bi bi-search"></i></button>
                                                  <a href="{{ route('admin.newsletter.index') }}" class="btn btn-danger rounded-pill"><i class="bi bi-arrow-clockwise"></i></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Table with hoverable rows -->
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Subscription date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($newsletters as $newsletter)
                                                <tr>
                                                    <th scope="row">{{ $newsletter->id }}</th>
                                                    <td>{{ $newsletter->email }}</td>
                                                    <td>{{ $newsletter->created_at }}</td>
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
            {{ $newsletters->links() }}
            <!-- End Pagination with icons -->
        </section>

    </main><!-- End #main -->
</x-admin.layout>
