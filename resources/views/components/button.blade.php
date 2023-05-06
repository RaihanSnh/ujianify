@props(['type' => 'button'])

<button type="{{ $type }}" class="rounded-lg bg-blue-400 text-gray-100 shadow w-full py-1.5 px-3 uppercase font-semibold hover:bg-blue-300">
    {{ $slot }}
</button>
