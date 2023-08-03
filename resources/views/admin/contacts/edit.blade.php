<x-admin.layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Contacts</h1>
            <x-admin.breadcrumb :items="[
                ['label' => 'Contacts'],
                ['label' => 'Contact ID: 123']
            ]"/>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">

                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-settings">Status</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Subject</h5>
                                    <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores
                                        cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt
                                        iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea
                                        saepe at unde.</p>

                                    <h5 class="card-title">Profile Details</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Date</div>
                                        <div class="col-lg-9 col-md-8">01/01/2023 01:01:01</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Contact name</div>
                                        <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">Lueilwitz@Wisoky.com</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Content</div>
                                        <div class="col-lg-9 col-md-8">Sunt est soluta temporibus accusantium neque nam
                                            maiores
                                            cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt
                                            iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea
                                            saepe at unde.
                                            Sunt est soluta temporibus accusantium neque nam maiores
                                            cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt
                                            iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea
                                            saepe at unde.
                                            Sunt est soluta temporibus accusantium neque nam maiores
                                            cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt
                                            iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea
                                            saepe at unde.</div>
                                    </div>
                                </div>


                                <div class="tab-pane fade pt-3" id="profile-settings">

                                    <!-- Settings Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <x-admin.form.label label="status"/>

                                            <div class="col-md-8 col-lg-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gridRadios"
                                                        id="gridRadios1" value="option1" checked>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        Open
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gridRadios"
                                                        id="gridRadios1" value="option1">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        Pending
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gridRadios"
                                                        id="gridRadios1" value="option1">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        Resolved
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
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
