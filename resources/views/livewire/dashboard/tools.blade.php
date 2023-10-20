<div>
    {{-- CONTROLL BLOCK BEGIN --}}
    <x-card class="mb-2">
        <x-row class="justify-between">
            <x-row>
                @can('create-tool')
                    <x-button.tooltip side='right' label="{{ __('tool.add') }}" class="ml-7">
                        <x-button.primary
                            wire:click="$emit('openModal','modals.new-tool-form')"
                            class="btn-circle">+
                        </x-button.primary>
                    </x-button.tooltip>
                @endcan
                <div class="px-10  w-96 ">
                    <x-input.text  wire:model="filters.search"  placeholder="{{ __('tool.search') }}..."/>
                </div>
                <x-button.tooltip label="{{ __('tool.tools') }}">
                    <x-selector wire:model='filters.type'>
                        <option selected value="{{ null }}">{{__('global.all')}}</option>
                        @foreach (\App\Models\Tool::getTypes() as $class )
                            <option value={{ $class }}>{{ (new $class)->myName }}</option>
                        @endforeach
                    </x-selector>
                </x-button.tooltip>
            </x-row>
        {{$tools->links()}}
        </x-row>
    </x-card>
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

