<x-admin.layout>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Banner ads</h1>
            @php
                $secondCrumb = 'Edit banner ID: ' . $banner->id
            @endphp
            <x-admin.breadcrumb :items="[['label' => 'Banner ads'], ['label' => $secondCrumb]]" />
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="/admin/banners/{{ $banner->id }}" class="mt-4" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <x-admin.form.input name="title" type="text" label="title" :value="old('title', $banner->title)">
                                    <x-admin.required-icon />
                                </x-admin.form.input>

                                <div class="d-flex flex-column">
                                    <div>
                                        <x-admin.form.input name="image_url" type="file" label="Image" />
                                    </div>
                                    <div class="align-self-center">
                                        @php
                                            $path = public_path('/storage/' . $banner->image_url);
                                            $imageSrc = File::exists($path) && !is_dir($path) ? asset('storage/' . $banner->image_url) : Constants::BANNER_PLACEHOLDER;
                                        @endphp
                                        <img src="{{ $imageSrc }}" alt="{{ $banner->image_url }}" width="100">
                                    </div>
                                </div>

                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Type
                                        <x-admin.required-icon />
                                    </legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" id="gridRadios1" value="{{ Constants::BANNER_TOP }}" @if(old('type', $banner->type) == Constants::BANNER_TOP) checked @endif>
                                            <label class="form-check-label" for="gridRadios1">Top banner 700x70</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" id="gridRadios2" value="{{ Constants::BANNER_SIDE }}" @if(old('type', $banner->type) == Constants::BANNER_SIDE) checked @endif>
                                            <label class="form-check-label" for="gridRadios2">Side banner 500x280</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" id="gridRadios2" value="{{ Constants::BANNER_CENTER }}" @if(old('type', $banner->type) == Constants::BANNER_CENTER) checked @endif>
                                            <label class="form-check-label" for="gridRadios2">Center banner 700x70</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <x-admin.form.input name="date" type="date" label="Published date" :value="old('date', $banner->date)">
                                    <x-admin.required-icon />
                                </x-admin.form.input>

                                <x-admin.form.input name="time" type="time" label="Time" :value="old('time', $banner->time)" :step="1">
                                    <x-admin.required-icon />
                                </x-admin.form.input>

                                <x-admin.form.checkbox name="status" legend="active" :value="old('status', $banner->status)" :checked="old('status', $banner->status) == Constants::ACTIVE" />

                                <x-admin.form.button route="{{ route('admin.banners.index') }}">Edit</x-admin.form.button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
</x-admin.layout>
