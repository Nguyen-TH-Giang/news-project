<x-admin.layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Posts</h1>
            <x-admin.breadcrumb :items="[['label' => 'Posts'], ['label' => 'Create new post']]" />
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- General Form Elements -->
                        <form action="/admin/posts" method="POST" enctype="multipart/form-data" id="postCreateForm" novalidate>
                            @csrf
                            <x-admin.form.input name="title" type="text" label="title" :value="old('title')">
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.input name="slug" type="text" label="slug" :value="old('slug')">
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.field>
                                <x-admin.form.label label="category" />
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="category_id">
                                        <option value="{{ Constants::EMPTY_VALUE }}">Open this category menu</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <x-admin.form.error field="category_id" />
                            </x-admin.form.field>

                            <x-admin.form.field>
                                <x-admin.form.label label="tags"/>
                                <div class="col-sm-10">
                                    <select class="form-select" multiple aria-label="multiple select example" name="tag_ids[]">
                                        <option value="{{ Constants::EMPTY_VALUE }}" @if(in_array(Constants::EMPTY_VALUE, old('tag_ids', []))) selected @endif>
                                            Remove all tags
                                        </option>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}" @if(in_array($tag->id, old('tag_ids', []))) selected @endif>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <x-admin.form.error field="tag_ids" />
                            </x-admin.form.field>

                            <x-admin.form.input name="thumbnail" type="file" label="thumbnail">
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Status
                                    <x-admin.required-icon />
                                </legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="{{ Constants::DRAFT }}" {{ old('status') == Constants::DRAFT ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gridRadios1">Draft</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="{{ Constants::PUBLISHED }}" {{ old('status') == Constants::PUBLISHED ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gridRadios2">Published</label>
                                    </div>
                                </div>
                                <x-admin.form.error field="status" />
                            </fieldset>

                            <x-admin.form.input name="date" type="date" label="Published date" :value="old('date')">
                                <x-admin.required-icon />
                            </x-admin.form.input>
                            <x-admin.form.input name="time" type="time" label="Time" :step="1" :value="old('time')">
                                <x-admin.required-icon />
                            </x-admin.form.input>
                            <x-admin.form.checkbox name="featured" legend="featured" :checked="old('featured') == Constants::FEATURED" />

                            <x-admin.form.checkbox name="trending" legend="trending" :checked="old('trending') == Constants::TRENDY" />
                            <x-admin.form.input name="description" type="text" label="description" :value="old('description')">
                                <x-admin.required-icon />
                            </x-admin.form.input>
                            <x-admin.form.textarea name="content" id="editor" label="content">
                                <x-admin.required-icon />
                                <x-slot name="content">{{ old('content') }}</x-slot>
                            </x-admin.form.textarea>
                            <x-admin.form.button route="{{ route('admin.posts.index') }}">Create</x-admin.form.button>
                        </form><!-- End General Form Elements -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
</x-admin.layout>
