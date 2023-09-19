<x-table.row class='text-center'>
    <x-table.cell>
        <img class="w-15 h-10 m-auto" src= "{{ $tool->getImg() }}" alt="ToolImg">
    </x-table.cell>
    <x-table.cell>{{ $tool->serialNumber() }}</x-table.cell>
    <x-table.cell>{{ $tool->type() }}</x-table.cell>
    <x-table.cell>{{ $tool->keeper() }}</x-table.cell>
    <x-table.cell>{{ $tool->tool->status->getReadableText() }} </x-table.cell>
    <x-table.cell>{{ $tool->created_at->format('Y.m.d.') }}</x-table.cell>

    <x-table.cell>
        <x-icon.edit {{-- wire:click="$emit('openModal','modals.user-info',['{{$user->id}}'])" --}} class="hover:text-blue-500 cursor-pointer"/>
    </x-table.cell>

</x-table.row>
