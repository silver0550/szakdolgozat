<x-table.row class='text-center'>
    <x-table.cell>{{$index.'.'}}</x-table.cell>
    <x-table.cell>{{$user->name}}</x-table.cell>
    <x-table.cell>{{$user->email}}</x-table.cell>
    <x-table.cell>{{$user->admin}}</x-table.cell>
    @can('SuperAdmin')
        <x-table.cell><x-button.toogle wire:click='update'  wire:model='user.admin'/></x-table.cell>
    @endcan
    @can('Admin')
        <x-table.cell>
            <x-icon.delete class="hover:text-red-500" wire:click='delete' style='cursor: pointer'/>
        </x-table.cell>
    @endcan
    <x-table.cell>
        <x-icon.info class="hover:text-blue-500" style='cursor: pointer'/>
    </x-table.cell>    
    
</x-table.row>

