<div class="flex items-center pl-0.5">
    <input {{ $value === 'true' ? 'checked ' : ' ' }} value='1' type="checkbox" name="{{ $name }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label class="w-full py-2 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $slot }}</label>
</div>
