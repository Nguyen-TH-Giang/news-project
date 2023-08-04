<x-admin.layout>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Newsletters</h1>
            <x-admin.breadcrumb :items="[
                ['label' => 'Newsletters'],
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
                                    <h5 class="card-title"></h5>

                                    <!-- Table with hoverable rows -->
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>test@test.com</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                                        <i class="bi bi-trash"></i>
                                                    </button>

                                                    <div class="modal fade" id="verticalycentered" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Vertically Centered</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Non omnis incidunt qui sed occaecati magni
                                                                    asperiores est mollitia. Soluta at et reprehenderit.
                                                                    Placeat autem numquam et fuga numquam. Tempora in
                                                                    facere consequatur sit dolor ipsum. Consequatur nemo
                                                                    amet incidunt est facilis. Dolorem neque recusandae
                                                                    quo sit molestias sint dignissimos.
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- End Vertically centered Modal-->
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">1</th>
                                                <td>test@test.com</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#verticalycentered">
                                                        <i class="bi bi-trash"></i>
                                                    </button>

                                                    <div class="modal fade" id="verticalycentered" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Vertically Centered</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Non omnis incidunt qui sed occaecati magni
                                                                    asperiores est mollitia. Soluta at et reprehenderit.
                                                                    Placeat autem numquam et fuga numquam. Tempora in
                                                                    facere consequatur sit dolor ipsum. Consequatur nemo
                                                                    amet incidunt est facilis. Dolorem neque recusandae
                                                                    quo sit molestias sint dignissimos.
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- End Vertically centered Modal-->
                                                </td>
                                            </tr>
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
            {{-- DO THIS --}}
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav><!-- End Pagination with icons -->
        </section>

    </main><!-- End #main -->
</x-admin.layout>