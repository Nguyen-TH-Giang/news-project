<x-admin.layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Banner ads</h1>
            <x-admin.breadcrumb :items="[['label' => 'Banner ads'], ['label' => 'Create new banner']]" />
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- General Form Elements -->
                        <form method="POST" action="/admin/banner">
                            @csrf
                            <x-admin.form.input name="title" type="text" label="title">
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.input name="image" type="file" label="image">
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Type
                                    <x-admin.required-icon />
                                </legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="gridRadios1"
                                            value="1" {{ old('type') == 1 ? 'checked' : '' }} >
                                        <label class="form-check-label" for="gridRadios1">
                                            Top banner 700x70
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="gridRadios2"
                                            value="2" {{ old('type') == 2 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gridRadios2">
                                            Side banner 500x280
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="gridRadios2"
                                            value="3" {{ old('type') == 3 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gridRadios2">
                                            Center banner 700x70
                                        </label>
                                    </div>
                                </div>
                                <x-admin.form.error name="type" />
                            </fieldset>

                            <x-admin.form.input name="date" type="date" label="Published date">
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.input name="time" type="time" label="Time">
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.checkbox name="active" legend="active" />

                            <x-admin.form.button>Create</x-admin.form.button>

                        </form><!-- End General Form Elements -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
</x-admin.layout>
