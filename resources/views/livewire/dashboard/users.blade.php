<div>
    {{-- CONTROLL BLOCK BEGIN --}}
    <div class ='flex justify-between w-full p-2 bg-base-200 rounded-md mb-2'>
        <div class="flex w-3/5">
            @can('Admin')
                <x-button.tooltip side='right' tooltip="Hozzáad">
                    <x-button.primary wire:click="$emitSelf('createUserToggle')" class="btn-circle">+</x-button.primary>
                </x-button.tooltip>
            @endcan           
            <x-input.text class="w-80 ml-40" placeholder="Keresés..."/>
            <x-button.primary class=" inline-block ml-2 float-right">
                <x-icon.search class=" w-6 h-6"/>
            </x-button.primary>
        </div>

        {{$users->links()}} {{--TODO: watch->paginator.body --}}
    </div>
    {{-- CONTROLL BLOCK END --}}    
    {{-- RESULT TABLE BEGIN --}}
    <x-table class="p-2 bg-base-200 rounded-md ">
        <x-slot name="head">
            <x-table.head class="cursor-default">#</x-table.head>
            <x-table.head wire:click="$emitSelf('sort','name')" class="cursor-pointer">Név</x-table.head>
            <x-table.head wire:click="$emitSelf('sort','email')" class="cursor-pointer">Email</x-table.head>
            <x-table.head wire:click="$emitSelf('sort','id')" class="cursor-pointer">Beosztás</x-table.head>
            @can('SuperAdmin')<x-table.head class="cursor-default">admin</x-table.head>@endcan
        </x-slot>
        <x-slot name='body'>
            @foreach ($users as $user)
                @livewire('dashboard.users-list', ['user' => $user, 'index' => $loop->index + (($users->currentPage()-1) * $pageSize ) + 1], key($user->id))    
            @endforeach
        </x-slot>
    </x-table>
    <x-pagination.info :paginator="$users" class=" mt-2 mr-2"/>
    {{-- RESULT TABLE END --}}
    {{-- MODALS BEGIN --}}
    <x-modal.default :isActive="$createModalVisible">
        @livewire('create-user')
    </x-modal.default>
    <x-modal.info wire:click="$emitSelf('createdToggle')" :isActive="$createdVisible">
        <h3 class="text-lg font-bold">Sikeres felvétel!</h3>
        <p class="py-4">A felhasználó az adatbázisban rögzítve lett.</p>
    </x-modal.info>
    {{-- MODALS END --}}
  
</div>
