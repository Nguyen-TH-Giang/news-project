@props(['name', 'legend'])

<div class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">{{ ucwords($legend) }}</legend>
    <div class="col-sm-10">
        <div class="form-check">
            <input type="hidden" name="{{ $name }}" value="{{ Constants::INACTIVE }}">

            <input class="form-check-input" type="checkbox" name="{{ $name }}" value="{{ Constants::ACTIVE }}" {{ $attributes }}>
        </div>
    </div>
</div>
