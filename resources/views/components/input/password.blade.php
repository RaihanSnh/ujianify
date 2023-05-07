<div class="relative">
    <input type="password" name="{{ $name }}" placeholder="{{ $placeholder }}" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:border-blue-300 focus:outline-none focus:shadow-outline">
    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 text-gray-700">
            <path x-show="show" fill-rule="evenodd" clip-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4zM10 2a8 8 0 00-8 8c0 2.743 1.5 5.104 3.711 6.404L5.808 18.2l1.414-1.414c.986-.986 1.836-2.073 2.478-3.229C10.3 12.763 10.7 12.38 11 12a2 2 0 00-1.414-3.414l1.414-1.414A3.996 3.996 0 0110 6a4 4 0 014 4c0 .53-.107 1.033-.284 1.5l1.45 1.45A7.954 7.954 0 0018 10a8 8 0 00-8-8zM10 16a6 6 0 110-12 6 6 0 010 12z"/>
            <path x-show="!show" fill-rule="evenodd" clip-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4zM10 2a8 8 0 00-8 8c0 2.743 1.5 5.104 3.711 6.404L5.808 18.2l1.414-1.414c.986-.986 1.836-2.073 2.478-3.229C10.3 12.763 10.7 12.38 11 12a2 2 0 00-1.414-3.414l1.414-1.414A3.996 3.996 0 0110 6a4 4 0 014 4c0 .53-.107 1.033-.284 1.5l1.45 1.45A7.954 7.954 0 0018 10a8 8 0 00-8-8zm0 14a6 6 0 100-12 6 6 0 000 12z"/>
        </svg>
    </button>
</div>
