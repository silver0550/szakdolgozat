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
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        {{-- <x-admin.theme /> --}}

        @livewireStyles
    </head>
    <body class="antialiased">
        
        {{ $slot }}
        
        @stack('scripts')

        @livewire('livewire-ui-modal')
        @livewireScripts
        
    </body>
</html>