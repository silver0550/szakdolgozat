@php
    $model = $tool->owner;
@endphp
<x-table.row class='text-center'>
    <x-table.cell>
        <img class="w-15 h-10 m-auto" src= "{{ $model->img }}" alt="ToolImg">
    </x-table.cell>
    <x-table.cell>{{ $model->serial_number }}</x-table.cell>
    <x-table.cell>{{ $model->myName }}</x-table.cell>
    <x-table.cell>{{ $model->keeper ?? "Raktár" }}</x-table.cell>
    <x-table.cell>{{ $model->tool->status->getReadableText() }} </x-table.cell>
    <x-table.cell>{{ $model->created_at->format('Y.m.d.') }}</x-table.cell>

    <x-table.cell>
    <x-icon.edit
        class="hover:text-blue-500 cursor-pointer"
        wire:click="$emit('openModal','modals.tool-info',
            { tool: {{ $tool->id }}, class: '{{ addslashes($model::class) }}' })"/>
    </x-table.cell>

</x-table.row>
