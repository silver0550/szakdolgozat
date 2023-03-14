<div>
    {{-- CONTROLL BLOCK BEGIN --}}
    <div class="h-12">
        <x-notifications.successful @class(['hidden' => !$notificationVisible])> {{$notificationMessage}}</x-notifications.successful>
    </div>
    <div class ='flex justify-between w-full p-2 bg-base-200 rounded-md mb-2'>
        <div class="flex w-1/2 justify-between">
            @can('Admin')
                <x-button.tooltip side='right' tooltip="Hozzáad" class="ml-7">
                    <x-button.primary wire:click="$emit('openModal','modals.new-user-form.new-user-form')" class="btn-circle">+</x-button.primary>
                </x-button.tooltip>
            @endcan
            <x-input.text wire:model="searchByName" class="ml-10" placeholder="Keresés..."/>
        </div>
        {{$users->links()}}
    </div>
    {{-- CONTROLL BLOCK END --}}
    {{-- RESULT TABLE BEGIN --}}
    <x-table class="p-2 bg-base-200 rounded-md ">
        <x-slot name="head">
            @if (!$users->count())
                <x-table.head class="cursor-default">A keresésnek nincs eredménye</x-table.head> 
            @else
                <x-table.head class="cursor-default">#</x-table.head> 
                <x-table.head wire:click="sort('name')" class="cursor-pointer">Név</x-table.head>
                <x-table.head wire:click="sort('email')" class="cursor-pointer">Email</x-table.head>
                <x-table.head wire:click="sort('id')" class="cursor-pointer">Létrehozva</x-table.head>
                @can('SuperAdmin')<x-table.head class="cursor-default">admin</x-table.head>@endcan
            @endif
        </x-slot>
        <x-slot name='body'>
            @foreach ($users as $user)
                @livewire('dashboard.users-list', ['user' => $user, 'index' => $loop->index + (($users->currentPage()-1) * $pageSize ) + 1], key($user->id))
            @endforeach
        </x-slot>
    </x-table>
    <x-pagination.info :paginator="$users" class=" mt-2 mr-2"/>
    {{-- RESULT TABLE END --}}
    
</div>
