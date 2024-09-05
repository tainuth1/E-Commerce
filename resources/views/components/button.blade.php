<button {{ $attributes->merge(['class' => 'px-4 py-2 rounded-md bg-blue-500 text-white transition-all hover:bg-blue-700']) }}>
    {{ $slot }}
</button>