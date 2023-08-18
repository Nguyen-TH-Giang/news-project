<x-admin.layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Banner ads</h1>
            <x-admin.breadcrumb :items="[['label' => 'Banner ads'], ['label' => 'Create new banner']]" />
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="/admin/banners" enctype="multipart/form-data" class="mt-4" id="bannerCreateForm" novalidate>
                                @csrf
                                <x-admin.form.input name="title" type="text" label="title" :value="old('title')">
                                    <x-admin.required-icon />
                                </x-admin.form.input>

                                <x-admin.form.input name="image_url" type="file" label="image">
                                    <x-admin.required-icon />
                                </x-admin.form.input>

                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Type
                                        <x-admin.required-icon />
                                    </legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" id="gridRadios1" value="{{ Constants::BANNER_TOP }}" {{ old('type') == Constants::BANNER_TOP ? 'checked' : '' }}>
                                            <label class="form-check-label" for="gridRadios1">Top banner (700x70)</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" id="gridRadios2" value="{{ Constants::BANNER_SIDE }}" {{ old('type') == Constants::BANNER_SIDE ? 'checked' : '' }}>
                                            <label class="form-check-label" for="gridRadios2">Side banner (500x280)</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" id="gridRadios3" value="{{ Constants::BANNER_CENTER }}" {{ old('type') == Constants::BANNER_CENTER ? 'checked' : '' }}>
                                            <label class="form-check-label" for="gridRadios3">Center banner (700x70)</label>
                                        </div>
                                        <div class="invalid-feedback" id="type"></div>
                                        <x-admin.form.error field="type" />
                                    </div>
                                </fieldset>

                                <x-admin.form.input name="date" type="date" label="Published date" :value="old('date')">
                                    <x-admin.required-icon />
                                </x-admin.form.input>

                                <x-admin.form.input name="time" type="time" label="Time" :step="1" :value="old('time')">
                                    <x-admin.required-icon />
                                </x-admin.form.input>

                                <x-admin.form.checkbox name="status" legend="active" :checked="old('status') == Constants::ACTIVE"/>

                                <x-admin.form.button route="{{ route('admin.banners.index') }}">Create</x-admin.form.button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
</x-admin.layout>
