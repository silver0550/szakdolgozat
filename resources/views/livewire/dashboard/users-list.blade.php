<x-table.row class='text-center'>
    <x-table.cell>{{$index.'.'}}</x-table.cell>
    <x-table.cell>{{$user->name}} @if($user->isAdmin) <span class="text-red-600">*</span>@endif</x-table.cell>
    <x-table.cell>{{$user->email}}</x-table.cell>
    <x-table.cell>{{$user->created_at->format('Y.m.d.')}}</x-table.cell>
    {{-- <x-table.cell>{{$user->property()->first()->department}}</x-table.cell> --}}
  
    @can('SuperAdmin')
        <x-table.cell><x-button.toggle class="relative top-1" wire:click='setAdmin' wire:model='isAdmin'/></x-table.cell>
    @endcan
    <x-table.cell>
        <x-button.tooltip label="{{$user->name}}">

        <x-icon.phone class=" hover:text-blue-500 cursor-pointer " /></x-table.cell> 
        </x-button.tooltip>
    <x-table.cell>

        @can('update', $user)
            <x-icon.edit wire:click="$emit('openModal','modals.user-info',['{{$user->id}}'])" class="hover:text-blue-500 cursor-pointer"/>
        @endcan

        @cannot('update', $user)
                @can('view', $user)
                    <x-icon.info wire:click="$emit('openModal','modals.user-info',['{{$user->id}}'])" class="hover:text-blue-500 cursor-pointer"/>
                @endcan
        @endcannot
                        
    </x-table.cell>

</x-table.row>

