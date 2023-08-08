<x-admin.layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Banner ads</h1>
            {{ $secondCrumb = 'Edit banner ID: ' . $banner->id }}
            <x-admin.breadcrumb :items="[['label' => 'Banner ads'], ['label' => $secondCrumb]]" />
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- General Form Elements -->
                        <form class="needs-validation" method="POST" action="/admin/banners/{{ $banner->id }}">
                            @csrf
                            @method('PATCH')

                            <x-admin.form.input name="title" type="text" label="title" :value="old('title', $banner->title)">
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <div class="d-flex flex-column">
                                <div>
                                    <x-admin.form.input name="thumbnail" type="file" label="thumbnail" />

                                </div>
                                <div class="align-self-center">
                                    @php
                                        $path = public_path('/storage/' . $banner->image_url);
                                        $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $banner->image_url) : Constants::BANNER_PLACEHOLDER;
                                    @endphp
                                    <img src="{{ $imageSrc }}" alt="{{ $banner->image_url }}"
                                        width="100">
                                </div>
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Type
                                    <x-admin.required-icon />
                                </legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="gridRadios1"
                                            value="{{ Constants::BANNER_TOP }}"
                                            {{ old('type', $banner->type) == Constants::BANNER_TOP ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gridRadios1">
                                            Top banner 700x70
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="gridRadios2"
                                            value="{{ Constants::BANNER_SIDE }}"
                                            {{ old('type', $banner->type) == Constants::BANNER_SIDE ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gridRadios2">
                                            Side banner 500x280
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="gridRadios2"
                                            value="{{ Constants::BANNER_CENTER }}"
                                            {{ old('type', $banner->type) == Constants::BANNER_CENTER ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gridRadios2">
                                            Center banner 700x70
                                        </label>
                                    </div>
                                </div>
                            </fieldset>

                            <x-admin.form.input name="date" type="date" label="Published date" :value="old('date', $banner->date)">
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.input name="time" type="time" label="Time" :value="old('time', $banner->time)" :step="1">
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.checkbox name="active" legend="active" :value="old('active', $banner->status)" :checked="old('active', $banner->status) ? true : false" />

                            <x-admin.form.button route="{{ route('admin.banners.index') }}">Create</x-admin.form.button>

                        </form><!-- End General Form Elements -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
</x-admin.layout>
