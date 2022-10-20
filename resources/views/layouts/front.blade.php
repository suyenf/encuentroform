<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.head')
</head>
<body>
    <div id="app">
        <h3 class="text-center mt-2">{{ config('app.name', 'Laravel') }}</h3>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
