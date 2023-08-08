@props(['name'])

@error($name)
    <div class="invalid-feedback d-flex">
        <div class="col-sm-2 col-form-label"></div>
        <p class="align-self-center">
            {{ $message }}
        </p>
    </div>
@enderror
