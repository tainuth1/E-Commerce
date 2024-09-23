<select {{ $attributes->merge(['class' => 'text-gray-700 border outline-none border-[1px] border-gray-300 rounded-md p-2 focus:border-[1px] focus:border-blue-400 dark:text-gray-200 dark:bg-[#2C2C2C]']) }}>
    @foreach($options as $key => $value)
        <option value="{{ $key }}" {{ $key == $selected ? 'selected' : '' }}>{{ $value }}</option>
    @endforeach
</select>