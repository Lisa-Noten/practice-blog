@props(['name', 'type' => 'text'])

<div class="mb-6">
    
    <x-form.label name="{{ $name }}"/>

    <input  type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            {{ $attributes(['value' => old($name)]) }}}
    >

    <x-form.error name="{{ $name }}"/>
</div>