<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon"
            type="image/j"
            href="{{ asset('img/favicon.jpg') }}" />

        <title>{{ env('APP_NAME') }}</title>

        <meta name="title" content="Short URL">
        <meta name="description" content="Service for creating long urls shorter">
        <meta name="keywords" content="url,shorter,uls,search,engine,">
        <meta name="robots" content="index, follow">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @stack('styles')
    </head>
    <body>
        @yield('body')
        @stack('scripts')
    </body>
</html>
