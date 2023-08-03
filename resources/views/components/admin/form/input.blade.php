@props(['name', 'type' => 'text', 'label'])

<div class="row mb-3">
    <label for="{{ $name }}" class="col-sm-2 col-form-label">{{ ucwords($label) }}</label>
    <div class="col-sm-10">
        <input class="form-control" type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" {{ $attributes(['value' => old($name)]) }}>
    </div>
    <x-admin.form.error name="{{ $name }}" />
</div>
