<x-admin.layout>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Contacts</h1>
            <x-admin.breadcrumb :items="[['label' => 'Contacts']]" />
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
                                                  <button type="submit" title="Search" class="btn btn-primary rounded-pill ms-1"><i class="bi bi-search"></i></button>
                                                  <a href="{{ route('admin.contacts.index') }}" class="btn btn-danger rounded-pill ms-1"><i class="bi bi-arrow-clockwise"></i></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Table with hoverable rows -->
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="w-5p">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col" class="w-15p">Email</th>
                                                <th scope="col" class="w-10p">Status</th>
                                                <th scope="col" class="w-15p">Date</th>
                                                <th scope="col" class="w-10p">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contacts as $contact)
                                                <tr>
                                                    <td scope="row"><strong>{{ $contact->id }}</strong></td>
                                                    <td>{{ $contact->name }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->status }}</td>
                                                    <td>{{ $contact->created_at }}</td>
                                                    <td>
                                                        <a class="btn btn-primary" href="/admin/contacts/{{ $contact->id }}/edit">
                                                            <i class="bi bi-pencil-square"></i></a>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#contactModal-{{ $contact->id }}">
                                                            <i class="bi bi-trash"></i>
                                                        </button>

                                                        <div class="modal fade" id="contactModal-{{ $contact->id }}"
                                                            tabindex="-1">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Delete contact</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">Do you really want to delete this contact ID: {{ $contact->id }}</div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                                        <form method="POST"
                                                                            action="/admin/contacts/{{ $contact->id }}">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-danger">Delete</button>
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
            {{-- DO THIS --}}
            {{ $contacts->links() }}
            <!-- End Pagination with icons -->
        </section>

    </main><!-- End #main -->
</x-admin.layout>
