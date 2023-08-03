<x-admin.layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Posts</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Posts</li>
                    <li class="breadcrumb-item active">Create new post</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- General Form Elements -->
                        <form class="needs-validation">
                            <x-admin.form.input name="title" type="text" label="title" />
                            <x-admin.form.input name="slug" type="text" label="slug" />

                            <x-admin.form.field>
                                <x-admin.form.label label="category"/>

                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </x-admin.form.label>

                            <x-admin.form.field>
                                <x-admin.form.label label="tags"/>

                                <div class="col-sm-10">
                                    <select class="form-select" multiple aria-label="multiple select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </x-admin.form.field>

                            <x-admin.form.input name="thumbnail" type="file" label="thumbnail" />

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios"
                                            id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            Draft
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios"
                                            id="gridRadios2" value="option2">
                                        <label class="form-check-label" for="gridRadios2">
                                            Published
                                        </label>
                                    </div>
                                </div>
                            </fieldset>

                            <x-admin.form.input name="date" type="date" label="Published date" />
                            <x-admin.form.input name="time" type="time" label="Time" />
                            <x-admin.form.checkbox name="trending" legend="trending" />
                            <x-admin.form.input name="description" type="text" label="description" />
                            <x-admin.form.textarea name="content" id="editor" label="content" />

                            <x-admin.form.button>Create</x-admin.form.button>

                        </form><!-- End General Form Elements -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
</x-admin.layout>
