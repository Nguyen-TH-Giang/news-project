@props(['name', 'id', 'label'])

<div class="row mb-3">
    <label for="{{ $name }}" class="col-sm-2 col-form-label">{{ ucwords($label) }}</label>
    <div class="col-sm-10">
        <textarea class="form-control" style="height: 500px" id="{{ $id }}" name="{{ $name }}"></textarea>
    </div>
    <x-admin.form.error name="{{ $name }}" />
</div>
