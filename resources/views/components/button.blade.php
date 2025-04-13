<button {{ $attributes->merge(['class' => 'px-3 py-2 rounded-lg font-semibold text-xl text-gray-900 dark:text-white transition ease-linear duration-150 hover:bg-blue-600'])}}>
    {{ $slot }}
</button>