<html>
    <head>
        @livewireStyles
        <link rel="stylesheet" href="/css/sidebar.css">
        
        @vite('resources/css/app.css')
        
        <title>Home</title>
    </head>
    <body>
        {{$slot}}
        @livewireScripts
    </body>
</html>