@if(env('VITE_ENABLED', 'true') === 'true')
    @vite(['resources/' . $src])
@else
    <script>{!! file_get_contents(base_path('resources/' . $src)) !!}</script>
@endif
