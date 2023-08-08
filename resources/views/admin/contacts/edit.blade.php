<x-admin.layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Contacts</h1>
            @php
                $secondCrumb = 'Edit contact ID: ' . $contact->id;
            @endphp
            <x-admin.breadcrumb :items="[['label' => 'Contacts'], ['label' => $secondCrumb]]" />
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">

                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Status</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Subject</h5>
                                    <p class="small fst-italic">{{ $contact->subject }}</p>

                                    <h5 class="card-title">Profile Details</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Date</div>
                                        <div class="col-lg-9 col-md-8">{{ $contact->created_at }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Contact name</div>
                                        <div class="col-lg-9 col-md-8">{{ $contact->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ $contact->email }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Content</div>
                                        <div class="col-lg-9 col-md-8">{!! $contact->content !!}</div>
                                    </div>
                                </div>


                                <div class="tab-pane fade pt-3" id="profile-settings">

                                    <!-- Settings Form -->
                                    <form method="POST" action="/admin/contacts/{{ $contact->id }}">
                                        @csrf
                                        @method('PATCH')

                                        <div class="row mb-3">
                                            <x-admin.form.label label="status" />

                                            <div class="col-md-8 col-lg-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="{{ Constants::OPEN }}" {{ old('type', $contact->status) == Constants::OPEN ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="gridRadios1">Open</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="{{ Constants::PENDING }}" {{ old('type', $contact->status) == Constants::PENDING ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="gridRadios2">Pending</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="gridRadios3" value="{{ Constants::RESOLVED }}" {{ old('type', $contact->status) == Constants::RESOLVED ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="gridRadios3">Resolved</label>
                                                </div>
                                            </div>
                                        </div>

                                        <x-admin.form.button route="{{ route('admin.contacts.index') }}">Edit</x-admin.form.button>
                                    </form><!-- End settings Form -->
                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main><!-- End #main -->
</x-admin.layout>
