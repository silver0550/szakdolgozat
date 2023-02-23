<div class="h-full">
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
    </div>
    {{-- CONTROLL BLOCK END --}}    
    {{-- RESULT TABLE BEGIN --}}
    <x-table class="p-2 bg-base-200 rounded-md max-h-[72vh]"> {{--TODO: relative table size!--}}
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
    {{-- RESULT TABLE END --}}
    {{-- PAGINATON BEGIN --}}

    {{-- {{$users->links()}} --}}
    <div class="fixed bottom-20 w-4/5">   
        <x-select class="ml-5 inline-block" wire:model='pageSize'>
            <option selected >15</option>
            <option>20</option>
            <option>25</option>
            <option>30</option>
        </x-select>
        {{$users->links()}} {{--TODO: watch->paginator.body --}}
    </div>
    
    {{-- PAGINATION END --}}
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
