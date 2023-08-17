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
                        <form method="POST" action="/admin/tags" id="tagCreateForm" novalidate>
                            @csrf
                            <x-admin.form.input name="name" type="text" label="Tag name" :value="old('name')">
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.input name="sort_order" type="text" label="sort order" :value="old('sort_order')"/>

                            <x-admin.form.button route="{{ route('admin.tags.index') }}">Create</x-admin.form.button>

                        </form><!-- End General Form Elements -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
</x-admin.layout>
