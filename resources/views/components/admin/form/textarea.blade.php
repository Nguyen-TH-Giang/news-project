@props(['name', 'id', 'label'])

<x-admin.form.field>
    <x-admin.form.label label="{{ $label }}">
        {{ $slot}}
        <x-admin.form.error field="{{ $name }}" />
        <div class="invalid-feedback" id="{{ $name }}"></div>
    </x-admin.form.label>
    <div class="col-sm-10">
        <textarea class="form-control" style="height: 500px" id="{{ $id }}" name="{{ $name }}">{{ $content}}</textarea>
    </div>

</x-admin.form.field>
