<x-table.row class='text-center'>
    <x-table.cell>
        <input
            wire:click="$emitUp('statusChanged', {{ $user->id }})"
            type="checkbox"
            class="checkbox checkbox-primary"/>
    </x-table.cell>
    <x-table.cell>{{ $user->name }}</x-table.cell>
    <x-table.cell>{{ $user->email }}</x-table.cell>
    <x-table.cell>
        {{ App\Models\PasswordReset::where('user_id', $user->id)->first()->created_at?->format('Y.m.d.') }}
    </x-table.cell>
    <x-table.cell>
        <x-button.tooltip label="{{ $user->phoneNumber ?? '-'}}">
            <x-icon.phone class=" hover:text-blue-500 cursor-pointer "/>
        </x-button.tooltip>
    </x-table.cell>
    <x-table.cell>
        @role('system|admin')
        <x-icon.edit
            wire:click="$emit('openModal','modals.user-info',['{{ $user->id }}'])"
            class="hover:text-blue-500 cursor-pointer"/>
        @endrole
    </x-table.cell>


</x-table.row>
