<x-admin.layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Generals</h1>
            <x-admin.breadcrumb :items="[
                ['label' => 'Generals'],
            ]"/>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- General Form Elements -->
                        <form class="needs-validation">
                            <x-admin.form.input name="contact_name" type="text" label="contact name" >
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.input name="email" type="text" label="email" >
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.input name="phone" type="text" label="phone" >
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <x-admin.form.input name="address" type="text" label="address" >
                                <x-admin.required-icon />
                            </x-admin.form.input>

                            <div class="d-flex flex-column">
                                <div>
                                    <x-admin.form.input name="logo" type="file" label="logo" >
                                        <x-admin.required-icon />
                                    </x-admin.form.input>
                                </div>
                                <div class="align-self-center">
                                    <img src="/backend/img/product-1.jpg" alt="" width="100">
                                </div>
                            </div>

                            <x-admin.form.input name="fb_link" type="text" label="FB link" />
                            <x-admin.form.input name="instagram_link" type="text" label="instagram link" />
                            <x-admin.form.input name="twitter_link" type="text" label="twitter link" />
                            <x-admin.form.input name="linkedin_link" type="text" label="linkedIn link" />
                            <x-admin.form.input name="youtube_link" type="text" label="youtube link" />
                            <x-admin.form.input name="vimeo_link" type="text" label="vimeo link" />

                            <x-admin.form.button>Edit</x-admin.form.button>

                        </form><!-- End General Form Elements -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
</x-admin.layout>