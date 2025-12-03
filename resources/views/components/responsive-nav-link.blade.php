@props(['active'])

@php
$classes = ($active ?? false)
           ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-pink-500 text-start text-base font-medium text-gray-900 text-gray-100 bg-gray-50 bg-gray-900/50 focus:outline-none transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-500 text-gray-400 hover:text-gray-700 hover:text-gray-300 hover:bg-gray-50 hover:bg-gray-700 hover:border-gray-300 hover:border-gray-700 focus:outline-none focus:text-gray-700 focus:text-gray-300 focus:bg-gray-50 focus:bg-gray-700 focus:border-gray-300 focus:border-gray-700 transition duration-150 ease-in-out';
@endphp


<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
