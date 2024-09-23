<textarea {{ $attributes->merge(['class' => 'text-gray-700 border outline-none border-[1px] border-gray-300 rounded-md p-2 focus:border-[1px] focus:border-blue-400 dark:text-gray-300 dark:bg-[#2C2C2C]']) }} >
    {{ $slot ?? $value }}
</textarea>