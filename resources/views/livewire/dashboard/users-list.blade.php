<x-table.row class='text-center'>
    <x-table.cell>{{$index}}</x-table.cell>
    <x-table.cell>{{$user->name}}</x-table.cell>
    <x-table.cell>{{$user->email}}</x-table.cell>
    <x-table.cell>{{$user->admin}}</x-table.cell>
    @can('SuperAdmin')
        <x-table.cell class='text-center'><input wire:click='update'  wire:model='user.admin' type="checkbox" class="toggle" /></x-table.cell>
    @endcan
    @can('Admin')
        <x-table.cell>
            <x-icon.delete wire:click='delete' style='cursor: pointer'/>
        </x-table.cell>
        <x-table.cell>
            <x-icon.info style='cursor: pointer'/>
        </x-table.cell>    
    @endcan
</x-table.row>

