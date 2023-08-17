@props(['name', 'type' => 'text', 'label'])

<x-admin.form.field>
    <x-admin.form.label label="{{ $label }}">
        {{ $slot }}
    </x-admin.form.label>

    <div class="col-sm-10">
        <input class="form-control" type="{{ $type }}" name="{{ $name }}"
            {{ $attributes(['value' => old($name)]) }}
            {{ $attributes['step'] }}>
        <div class="invalid-feedback" id="{{ $name }}"></div>
        <x-admin.form.error field="{{ $name }}" />
    </div>
</x-admin.form.field>
