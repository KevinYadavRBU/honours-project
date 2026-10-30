<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Reading List')</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-stone-50 text-stone-900 antialiased">
        <div class="mx-auto max-w-3xl px-4 py-10">
            @if (session('success'))
                <p class="mb-6 rounded-md bg-green-100 px-4 py-3 text-sm text-green-800">{{ session('success') }}</p>
            @endif

            @yield('content')
        </div>
    </body>
</html>
