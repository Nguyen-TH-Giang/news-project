@props(['name', 'type' => 'text', 'label'])

<x-admin.form.field>
    <x-admin.form.label :for="$name" label="{{ $label }}">
        {{ $slot }}
    </x-admin.form.label>

    <div class="col-sm-10">
        <input class="form-control" type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            {{ $attributes(['value' => old($name)]) }}
            {{ $attributes['step'] }}>
    </div>
    <x-admin.form.error name="{{ $name }}" />
</x-admin.form.field>
