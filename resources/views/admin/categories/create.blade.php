<x-admin.layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Categories</h1>
            <x-admin.breadcrumb :items="[['label' => 'Categories'], ['label' => 'Create new category']]" />
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- General Form Elements -->
                        <form action="/admin/categories" method="POST">
                            @csrf

                            <x-admin.form.input name="title" type="text" label="name" :value="old('title')">
                                <x-admin.required-icon />
                            </x-admin.form.input>
                            <x-admin.form.input name="slug" type="text" label="slug" :value="old('slug')">
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.field>
                                <x-admin.form.label label="parent category" />

                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="parent_id">
                                        <option value="{{ Constants::EMPTY_VALUE }}">Open this category menu</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if(old('parent_id') == $category->id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <x-admin.form.error name="parent_id" />
                            </x-admin.form.field>

                            <x-admin.form.input name="sort_order" type="text" label="sort order" :value="old('sort_order')"/>
                            <x-admin.form.checkbox name="status" legend="active" :checked="old('status') == Constants::ACTIVE"/>

                            <x-admin.form.button route="{{ route('admin.categories.index') }}">Create</x-admin.form.button>

                        </form><!-- End General Form Elements -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
</x-admin.layout>
