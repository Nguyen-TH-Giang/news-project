<x-admin.layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tags</h1>
            @php
                $secondCrumb = 'Edit tag ID: ' . $tag->id;
            @endphp
            <x-admin.breadcrumb :items="[['label' => 'Tags'], ['label' => $secondCrumb]]" />
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- General Form Elements -->
                        <form method="POST" action="/admin/tags/{{ $tag->id }}">
                            @csrf
                            @method('PATCH')

                            <x-admin.form.input name="name" type="text" label="name" :value="old('name', $tag->name)">
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.input name="sort_order" type="text" label="sort order" :value="old('sort_order', $tag->sort_order)"/>

                            <x-admin.form.button route="{{ route('admin.tags.index') }}">Edit</x-admin.form.button>

                        </form><!-- End General Form Elements -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
</x-admin.layout>
