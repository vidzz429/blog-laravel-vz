@props(['name', 'label', 'type' => 'text', 'value' => null])

<div>
    <label for="{{ $name }}" class="mb-2 block text-sm font-medium text-gray-900">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        value="{{ $type === 'password' ? '' : old($name, $value) }}"
        {{ $attributes->merge(['class' => 'block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-primary-600 focus:ring-primary-600']) }}>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
