<x-layouts.base>
    
    <div class="flex mi-hscreen">
        <div class="w-60 fixed left-0 top-0 h-screen flex flex-col bg-base-200">
            <x-sidemenu/>
        </div>
    </div>
    <div class="flex-1 flex flex-col relative ml-60 scroll-smooth scroll-pt-16 mt-16 mb-16">
        <div class="flex-1 px-8 py-4">
            {{ $slot }}
        </div>
    </div>
    <x-navbar/>
    <x-footer/>
    
</x-layouts.base>
