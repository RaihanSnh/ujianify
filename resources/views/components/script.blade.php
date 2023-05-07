@if(env('VITE_ENABLED', 'true') === 'true')
    @vite(['resources/' . $src])
@else
    <script src="{{ asset($src) }}"></script>
@endif
