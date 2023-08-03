@props(['name', 'legend'])

<div class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">{{ ucwords($legend) }}</legend>
    <div class="col-sm-10">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="{{ $name }}">
        </div>
    </div>
</div>
