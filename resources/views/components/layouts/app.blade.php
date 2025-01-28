<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Restaurant-Recipes-App. </title>
        <!-- Styles / Scripts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite('resources/css/app.css')
            @vite('resources/js/app.js')
        @endif
    </head>
    <body>
        <livewire:header/>
        {{ $slot }}
        <livewire:footer/>
    </body>
</html>
