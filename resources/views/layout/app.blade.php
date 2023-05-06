<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Ujianify' }}</title>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>

    @if(env('TAILWIND_VITE', 'true'))
        @vite('resources/css/app.css')
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif

    @yield('head')
</head>
<body>
@yield('body')
@yield('scripts')
</body>
</html>
