@props(['name'])

@error($name)
    <div class="invalid-feedback d-flex">{{ $message }}</div>
@enderror
