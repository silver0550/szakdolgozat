<div>

    <x-table>
        <x-slot name="head">
            <x-table.head wire:click="$emitSelf('sort','id')" style="cursor: pointer">#</x-table.head>
            <x-table.head wire:click="$emitSelf('sort','name')" style="cursor: pointer">Név</x-table.head>
            <x-table.head wire:click="$emitSelf('sort','email')" style="cursor: pointer">Email</x-table.head>
            <x-table.head wire:click="$emitSelf('sort','id')" style="cursor: pointer">Beosztás</x-table.head>
            @can('SuperAdmin')<x-table.head>admin</x-table.head>@endcan
        </x-slot>
        <x-slot name='body'>
            @foreach ($users as $user)
                @livewire('dashboard.users-list', ['user' => $user, 'index' => $loop->index + 1], key($user->id))    
            @endforeach
        </x-slot>

    </x-table>
    @livewire('pagination', ['pageSize' => 10])
</div>
