<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Reading List')</title>

        @vite('resources/css/reading-list.css')
    </head>
    <body>
        <header class="site-header">
            <a href="{{ route('books.index') }}">Reading List</a>
        </header>

        <main class="page-container">
            @if (session('success'))
                <p class="success-message" role="status">{{ session('success') }}</p>
            @endif

            @yield('content')
        </main>
    </body>
</html>
