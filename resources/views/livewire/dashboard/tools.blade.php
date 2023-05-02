<div>
    {{-- CONTROLL BLOCK BEGIN --}}
    <div class ='flex justify-between w-full p-2 bg-base-200 rounded-md mb-2'>
        <div class="flex  ">
            @can('create', App\Models\Tool::class)
                <x-button.tooltip side='right' label="Hozzáad" class="ml-7">
                    <x-button.primary wire:click="$emit('openModal','modals.new-tool-form')" class="btn-circle">+</x-button.primary>
                </x-button.tooltip>
            @endcan
            <div class="px-10  w-96 ">
                <x-input.text wire:model="search"  placeholder="Keresés..."/>
            </div>
            <div class="flex">
                <x-button.tooltip label="Eszközök">
                    <x-selector wire:model='typeFilter'>
                        <option selected value="{{null}}">Összes</option>
                        @foreach (\App\Service\ToolService::getClasses() as $class => $name)
                            <option value={{$class}}>{{$name}}</option>
                        @endforeach
                    </x-selector>    
                </x-button.tooltip>
            </div>
        </div>
        {{$tools->links()}}
    </div>
    {{-- CONTROLL BLOCK END --}}
    {{-- RESULT TABLE BEGIN --}}
    <x-table class="p-2 bg-base-200 rounded-md ">
        <x-slot name="head">
            @if (!$tools->count())
                <x-table.head class="cursor-default">A keresésnek nincs eredménye</x-table.head> 
            @else
                <x-table.head class="cursor-default">Azonosító</x-table.head> 
                <x-table.head class="cursor-default" >Típus</x-table.head>
                <x-table.head class="cursor-default">Tulajdonosa</x-table.head>
                <x-table.head class="cursor-default" >Létrehozva</x-table.head>
            @endif
        </x-slot>
        <x-slot name='body'>
            @foreach ($tools as $tool)
                @livewire('dashboard.tools-list', ['tool' => $tool->owner], key($tool->id))
            @endforeach
        </x-slot>
    </x-table>
    <x-pagination.info :paginator="$tools" class=" mt-2 mr-2"/>
    {{-- RESULT TABLE END --}}

</div>

