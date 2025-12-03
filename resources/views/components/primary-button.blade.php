<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => '
        inline-flex items-center
        bg-pink-500
        text-white
        uppercase
        text-xs font-bold
        py-3 px-6
        rounded-lg
        shadow-md
        transition-all
        hover:shadow-lg hover:bg-pink-600
        active:bg-pink-700
        focus:outline-none
        focus:ring-2 focus:ring-pink-400 focus:ring-offset-2
    '
]) }}>
    {{ $slot }}
</button>
