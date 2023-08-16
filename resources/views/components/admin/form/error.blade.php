@props(['name'])

@error($name)
    <div class="invalid-feedback d-flex">
        <p class="align-self-center">
            {{ $message }}
        </p>
    </div>
@enderror
