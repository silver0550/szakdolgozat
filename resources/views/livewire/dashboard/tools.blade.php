<div>
    {{-- CONTROLL BLOCK BEGIN --}}
    <div class ='flex justify-between w-full p-2 bg-base-200 rounded-md mb-2'>
        <div class="flex  ">
            @can('create-tool')
                <x-button.tooltip side='right' label="Hozzáad" class="ml-7">
                    <x-button.primary
                        wire:click="$emit('openModal','modals.new-tool-form')"
                        class="btn-circle">+
                    </x-button.primary>
                </x-button.tooltip>
            @endcan
            <div class="px-10  w-96 ">
                <x-input.text wire:model="search"  placeholder="Keresés..."/>
            </div>
            <div class="flex">
                <x-button.tooltip label="Eszközök">
                    <x-selector wire:model='typeFilter'>
                        <option selected value="{{ null }}">Összes</option>
                        @foreach (\App\Models\Tool::getTypes() as $class )
                            <option value={{ $class }}>{{ (new $class)->myName }}</option>
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
            @if ($tools->isEmpty())
                <x-table.head class="cursor-default">{{ __('global_table.search_empty') }}</x-table.head>
            @else
                <x-table.head class="cursor-default"></x-table.head>
                <x-table.head class="cursor-default">{{ __('global_table.serial_number') }}</x-table.head>
                <x-table.head class="cursor-default" >{{ __('global_table.type') }}</x-table.head>
                <x-table.head class="cursor-default">{{ __('global_table.owner') }}</x-table.head>
                <x-table.head class="cursor-default">{{ __('global_table.status') }}</x-table.head>
                <x-table.head class="cursor-default" >{{ __('global_table.created_by') }}</x-table.head>
            @endif
        </x-slot>
        <x-slot name='body'>
            @foreach ($tools as $tool)
                @livewire('dashboard.tools-list', ['tool' => $tool], key($tool->id))
            @endforeach
        </x-slot>
    </x-table>
    <x-pagination.info :paginator="$tools" class=" mt-2 mr-2"/>
    {{-- RESULT TABLE END --}}

</div>

