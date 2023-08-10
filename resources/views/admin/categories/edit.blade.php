<x-admin.layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Categories</h1>
            @php
                $secondCrumb = 'Edit category ID: ' . $category->id;
            @endphp
            <x-admin.breadcrumb :items="[['label' => 'Categories'], ['label' => $secondCrumb]]" />
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- General Form Elements -->
                        <form method="POST" action="/admin/categories/{{ $category->id }}">
                            @csrf
                            @method('PATCH')

                            <x-admin.form.input name="title" type="text" label="name" :value="old('title', $category->name)">
                                <x-admin.required-icon />
                            </x-admin.form.input>
                            <x-admin.form.input name="slug" type="text" label="slug" :value="old('slug', $category->slug)">
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.field>
                                <x-admin.form.label label="parent category" />

                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="parent_id">
                                        <option value="{{ Constants::EMPTY_VALUE }}">Remove parent category</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}" {{ old('parent_id', $category->parent_id) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </x-admin.form.field>

                            <x-admin.form.input name="sort_order" type="text" label="sort order" :value="old('sort_order', $category->sort_order)"/>
                            <x-admin.form.checkbox name="status" legend="active" :value="old('status', $category->status)" :checked="old('status', $category->status) == Constants::ACTIVE"/>

                            <x-admin.form.button route="{{ route('admin.categories.index') }}">Edit</x-admin.form.button>

                        </form><!-- End General Form Elements -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
</x-admin.layout>
