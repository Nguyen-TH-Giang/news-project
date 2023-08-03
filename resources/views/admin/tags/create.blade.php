<x-admin.layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tags</h1>
            <x-admin.breadcrumb :items="[
                ['label' => 'Tags'],
                ['label' => 'Create new tag']
            ]"/>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- General Form Elements -->
                        <form class="needs-validation">
                            <x-admin.form.input name="name" type="text" label="name" />

                            <x-admin.form.input name="sort_order" type="number" label="sort order" />

                            <x-admin.form.button>Create</x-admin.form.button>

                        </form><!-- End General Form Elements -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
</x-admin.layout>
