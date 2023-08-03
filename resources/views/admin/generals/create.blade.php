<x-admin.layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Generals</h1>
            <x-admin.breadcrumb :items="[
                ['label' => 'Generals'],
            ]"/>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
              <div class="col-lg-12">

                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><a class="btn btn-warning" href="javascript:void(0)">Add new generals information</a></h5>
                    <p>There is no information about you, click the button above to create a new one.</p>
                  </div>
                </div>

              </div>
            </div>
          </section>
    </main><!-- End #main -->
</x-admin.layout>
