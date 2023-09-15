<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Corp</title>
        <link
          rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css"
          integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"
        />
        @stack('styles')
        {{-- @vite('vendor/tinymce/tinymce/tinymce.min.js') --}}
        @vite([
            'resources/css/app.css',
            'resources/js/app.js',
        ])
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
            integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        {{-- <x-admin.theme /> --}}

        @livewireStyles
    </head>
    <body class="antialiased">

        {{ $slot }}

        @stack('scripts')

        @livewire('livewire-ui-modal')
        @livewireScripts

    </body>
    <x-notification/>
</html>
