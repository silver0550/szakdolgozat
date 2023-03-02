<x-table.row class='text-center'>
    <x-table.cell>{{$index.'.'}}</x-table.cell>
    <x-table.cell>{{$user->name}}</x-table.cell>
    <x-table.cell>{{$user->email}}</x-table.cell>
    <x-table.cell>{{$user->admin}}</x-table.cell>
    @can('SuperAdmin')
        <x-table.cell><x-button.toggle class="relative top-1" wire:click='update'  wire:model='user.admin'/></x-table.cell>
    @endcan
    @can('Admin')
        <x-table.cell>
            <x-icon.delete class="hover:text-red-500" wire:click="$emit('openModal','modals.delete-alert',['{{$user->id}}'])" style='cursor: pointer'/>
        </x-table.cell>
    @endcan
    <x-table.cell>
        <x-icon.info wire:click="$emitUp('showInfo',{{$user->id}})" class="hover:text-blue-500" style='cursor: pointer'/>
    </x-table.cell>    
    
</x-table.row>

