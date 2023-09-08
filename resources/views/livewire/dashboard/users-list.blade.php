<x-table.row class='text-center'>
    <x-table.cell>{{$index.'.'}}</x-table.cell>
    <x-table.cell>{{$user->name}} @if($user->isAdmin) <span class="text-red-600">*</span>@endif</x-table.cell>
    <x-table.cell>{{$user->email}}</x-table.cell>
    <x-table.cell>{{$user->created_at->format('Y.m.d.')}}</x-table.cell>
    
    <x-table.cell>
        <x-button.tooltip label="{{$user->name}}">
            <x-icon.phone class=" hover:text-blue-500 cursor-pointer " />
        </x-button.tooltip>
    </x-table.cell>
    <x-table.cell>
        @can('edit-user')
            <x-icon.edit
                wire:click="$emit('openModal','modals.user-info',['{{$user->id}}'])"
                class="hover:text-blue-500 cursor-pointer"
            />
        @else
            @if(
                user()->hasRole('leader')
                && user()->property->department === $user->property->department
                || $user->id === user_id())
                    <x-icon.info
                        wire:click="$emit('openModal','modals.user-info',['{{$user->id}}'])"
                        class="hover:text-blue-500 cursor-pointer"
                    />
            @endif
        @endcan
    </x-table.cell>

</x-table.row>

