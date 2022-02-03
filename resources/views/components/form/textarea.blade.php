@props(['name'])
<div class="mb-6">
    <x-form.label name="{{ $name }}"/>
    <textarea
            name="{{ $name }}"
            id="{{ $name }}"
    >{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}"/>
</div>