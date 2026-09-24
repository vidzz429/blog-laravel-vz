@props(['active' => false])
<a {{ $attributes }} aria-current="{{ $active ? 'page' : false }}"
    class="{{ $active ? ' bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block rounded-md text-base font-medium px-3 py-2">{{ $slot }}</a>
