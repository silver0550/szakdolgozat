<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Corp</title>
        @stack('styles')
        {{-- @vite('vendor/tinymce/tinymce/tinymce.min.js') --}}
        @vite([
            'resources/css/app.css',
            'resources/js/app.js',
        ])

        {{-- <x-admin.theme /> --}}

        @livewireStyles
    </head>
    <body>
    {{-- <body class="antialiased"> --}}
        {{ $slot }}

        @stack('scripts')

        @livewireScripts
    </body>
</html>