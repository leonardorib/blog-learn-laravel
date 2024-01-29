@props(['name', 'type' => 'text', 'required' => true])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <input
        class="border border-gray-400 p-2 w-full"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name) }}"
        {{ $required ? 'required' : '' }}
    />

    <x-form.error name="{{ $name }}" />
</x-form.field>