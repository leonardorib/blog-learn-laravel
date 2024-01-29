@props(['name', 'type' => 'text', 'required' => true])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <input
        class="border border-gray-200 p-2 w-full rounded"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes([
            'value' => $type == 'password' ? '' : old($name),
        ]) }}
    />

    <x-form.error name="{{ $name }}" />
</x-form.field>
