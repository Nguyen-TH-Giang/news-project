<x-admin.layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Posts</h1>
            @php
                $secondCrumb = 'Edit post ID: ' . $post->id;
            @endphp
            <x-admin.breadcrumb :items="[['label' => 'Posts'], ['label' => $secondCrumb]]" />
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- General Form Elements -->
                        <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <x-admin.form.input name="title" type="text" label="title" :value="old('title', $post->title)">
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.input name="slug" type="text" label="slug" :value="old('title', $post->slug)">
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.field>
                                <x-admin.form.label label="category" />
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="category_id">
                                        <option value="{{ Constants::EMPTY_VALUE }}">Open this select menu</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if(old('category_id', $post->category_id) == $category->id) selected @endif>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <x-admin.form.error name="category_id" />
                            </x-admin.form.field>

                            <x-admin.form.field>
                                <x-admin.form.label label="tags"/>
                                <div class="col-sm-10">
                                    <select id="mulSelect" class="form-select" multiple aria-label="multiple select example" name="tag_ids[]">
                                        <option value="{{ Constants::EMPTY_VALUE }}" @if(in_array(Constants::EMPTY_VALUE, old('tag_ids', []))) selected @endif>
                                            Remove all tags
                                        </option>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}" @if(in_array($tag->id, old('tag_ids', [])) || in_array($tag->id, $post->tag_ids)) selected @endif>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </x-admin.form.field>

                            <div class="d-flex flex-column">
                                <div>
                                    <x-admin.form.input name="thumbnail" type="file" label="thumbnail" />
                                </div>
                                <div class="align-self-center">
                                    @php
                                        $path = public_path('/storage/' . $post->thumbnail);
                                        $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $post->thumbnail) : Constants::POST_PLACEHOLDER;
                                    @endphp
                                    <img src="{{ $imageSrc }}" alt="{{ $post->thumbnail }}" width="100">
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Status
                                    <x-admin.required-icon />
                                </legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="{{ Constants::DRAFT }}" @if(old('status', $post->status) == Constants::DRAFT) checked @endif>
                                        <label class="form-check-label" for="gridRadios1">Draft</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="{{ Constants::PUBLISHED }}" @if(old('status', $post->status) == Constants::PUBLISHED) checked @endif>
                                        <label class="form-check-label" for="gridRadios2">Published</label>
                                    </div>
                                </div>
                            </fieldset>

                            <x-admin.form.input name="date" type="date" label="Published date" :value="old('date', $post->date)">
                                <x-admin.required-icon />
                            </x-admin.form.input>
                            <x-admin.form.input name="time" type="time" label="Time" :value="old('time', $post->time)" :step="1">
                                <x-admin.required-icon />
                            </x-admin.form.input>
                            <x-admin.form.checkbox name="featured" legend="featured" :value="old('featured', $post->featured)" :checked="old('featured', $post->featured) == Constants::FEATURED"/>
                            <x-admin.form.checkbox name="trending" legend="trending" :value="old('status', $post->trending)" :checked="old('trending', $post->trending) == Constants::TRENDY"/>
                            <x-admin.form.input name="description" type="text" label="description" :value="old('description', $post->description)"/>
                            <x-admin.form.textarea name="content" id="editor" label="content">
                                <x-slot name="content">{{ old('content', $post->content) }}</x-slot>
                            </x-admin.form.textarea>
                            <x-admin.form.button route="{{ route('admin.posts.index') }}">Edit</x-admin.form.button>

                        </form><!-- End General Form Elements -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
</x-admin.layout>
