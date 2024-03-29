<x-table.row class='text-center'>
    <x-table.cell>{{ $user->name }}</x-table.cell>
    <x-table.cell>{{ $user->email }}</x-table.cell>
    <x-table.cell>{{ $user->created_at->format('Y.m.d.') }}</x-table.cell>
    <x-table.cell>
        <x-button.tooltip label="{{ formatPhoneNumber($user->phoneNumber) ?? '-' }}">
            <x-icon.phone class="hover:text-blue-500 cursor-pointer"/>
        </x-button.tooltip>
    </x-table.cell>
    <x-table.cell>
        @role('system|admin')
            <x-icon.edit
                wire:click="$emit('openModal','modals.user-info',['{{ $user->id }}'])"
                class="hover:text-blue-500 cursor-pointer"/>
            <x-icon.delete
                wire:click="$emitUp('delete','{{ $user->id }}')"
                class="hover:text-red-500 cursor-pointer"/>
        @else
            @if(
                user()->hasRole('leader')
                && user()->property->department === $user->property->department
                || $user->id === user_id())
                    <x-icon.info
                        wire:click="$emit('openModal','modals.user-info',['{{ $user->id }}'])"
                        class="hover:text-blue-500 cursor-pointer"
                    />
            @endif
        @endrole
    </x-table.cell>
</x-table.row>

