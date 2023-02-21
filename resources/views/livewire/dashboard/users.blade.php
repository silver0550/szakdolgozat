<div>
    {{-- CONTROLL BLOCK BEGIN --}}
    <div class ='flex justify-between w-full p-2 bg-base-200 rounded-md mb-2'>
        <div class="flex w-3/5">
            @can('Admin')
                <x-button.tooltip side='right' tooltip="Hozzáad" class="ml-5">
                    <x-modal for="create-user" label='+' class='btn-circle'>
                        <x-modal.create-user-content wire:click='create' for='create-user'></x-modal-content>
                    </x-modal>
                </x-button.tooltip>
            @endcan
            <x-input.text class="w-80 ml-40" placeholder="Keresés..."/>
            <x-button.primary class=" inline-block ml-2 float-right">
                <x-icon.search class=" w-6 h-6"/>
            </x-button.primary>
        </div>
        <x-pagination.body class="float-right ">
            <x-select wire:model='pageSize' class="mx-4">
                <option>10</option>
                <option selected >15</option>
                <option>20</option>
                <option>50</option>
            </x-select>
            @foreach ($users as $page)
                <x-pagination.button wire:click="$set('currentPage','{{$loop->index}}')" @class(['btn-active' => $loop->index == $currentPage])>
                    {{$loop->index+1}}
                </x-pagination.button>
            @endforeach
        </x-pagination.body>
    </div>
    {{-- CONTROLL BLOCK END --}}

    {{-- RESULT TABLE BEGIN --}}
    <x-table class="p-2 bg-base-200 rounded-md">
        <x-slot name="head">
            <x-table.head class="cursor-default">#</x-table.head>
            <x-table.head wire:click="$emitSelf('sort','name')" class="cursor-pointer">Név</x-table.head>
            <x-table.head wire:click="$emitSelf('sort','email')" class="cursor-pointer">Email</x-table.head>
            <x-table.head wire:click="$emitSelf('sort','id')" class="cursor-pointer">Beosztás</x-table.head>
            @can('SuperAdmin')<x-table.head class="cursor-default">admin</x-table.head>@endcan
        </x-slot>
        <x-slot name='body'>
            @foreach ($users[$currentPage] as $user)
                @livewire('dashboard.users-list', ['user' => $user, 'index' => $loop->index + ($currentPage * $pageSize ) + 1], key($user->id))    
            @endforeach
        </x-slot>
    </x-table>
    {{-- RESULT TABLE END --}}
    
</div>
