@props(['name', 'type' => 'text', 'value' => ''])

<x-form.input-wrapper>

    <x-form.label :name="$name"></x-form.label>

    <input name="{{ $name }}" value="{{ old($name, $value) }}" class="form-control" id="{{ $name }}"
        type="{{ $type }}">

    <x-error :name="$name"></x-error>
</x-form.input-wrapper>
