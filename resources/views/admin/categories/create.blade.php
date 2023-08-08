<x-admin.layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Categories</h1>
            <x-admin.breadcrumb :items="[
                ['label' => 'Categories'],
                ['label' => 'Create new category']
            ]"/>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- General Form Elements -->
                        <form>
                            <x-admin.form.input name="name" type="text" label="name" >
                                <x-admin.required-icon />
                            </x-admin.form.input>
                            <x-admin.form.input name="slug" type="text" label="slug" >
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.field>
                                <x-admin.form.label label="parent category" />

                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </x-admin.form.field>

                            <x-admin.form.input name="sort_order" type="number" label="sort order" />
                            <x-admin.form.checkbox name="active" legend="active" />

                            <x-admin.form.button>Create</x-admin.form.button>

                        </form><!-- End General Form Elements -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
</x-admin.layout>
