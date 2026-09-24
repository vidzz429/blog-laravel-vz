@props(['name', 'img' => null])

@if ($img)
    <img src="{{ $img }}" alt="{{ $name }}"
        {{ $attributes->merge(['class' => 'rounded-full object-cover']) }}>
@else
    @php
        $colors = [
            'bg-red-500',
            'bg-orange-500',
            'bg-amber-500',
            'bg-green-500',
            'bg-teal-500',
            'bg-blue-500',
            'bg-indigo-500',
            'bg-purple-500',
            'bg-pink-500',
        ];

        $index = ord(strtoupper(substr($name, 0, 1))) % count($colors);
        $color = $colors[$index];
        $initial = strtoupper(substr($name, 0, 1));
    @endphp

<div {{ $attributes->merge(['class' => "$color rounded-full text-white flex items-center justify-center font-semibold"]) }}>
    {{ $initial }}
</div>
@endif
